<?php
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
//Nếu không phải là sự kiện đăng ký thì không xử lý
if (isset($_POST['update_order']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    $delivery_status = $_POST['delivery_status'];
    $order_id = $_POST['order_id'];
    $note = $_POST['note'];
    $created_at = date('Y-m-d H:i:s');
    $error = array();
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ($delivery_status == null) {
        $error['delivery_status'] = 'Bạn chưa chọn trạng thái vậy chuyển';
    }
    if ($note == null) {
        $error['note'] = 'Bạn chưa nhập ghi chú';
    }
    if (!$error) {
        //Lưu thông tin thành viên vào bảng
        $sql = "UPDATE orders SET delivery_status = $delivery_status WHERE id = $order_id";
        $query = $conn->query($sql);
        $addorder_history = mysqli_query($conn, "
            INSERT INTO order_history (
                order_id,
                note,
                status,
                created_at
            )
            VALUE (
                '{$order_id}',
                '{$note}',
                '{$delivery_status}',
                '{$created_at}'
            )
            ");
        $user_id = $order_detail['user_id'];
        $name_delivery_status = "";
        if ($delivery_status == 0) {
            $name_delivery_status = 'Chờ xác nhận';
        } elseif ($delivery_status == 1) {
            $name_delivery_status = 'Đã xác nhận';
        } elseif ($delivery_status == 2) {
            $name_delivery_status = 'Đang giao';
        } elseif ($delivery_status == 3) {
            $name_delivery_status = 'Đã giao';
        } else {
            $name_delivery_status = 'Đã hủy';
        }
        
        $content = "Đơn hàng " . $order_detail['code'] . " của bạn đã được chủ của hàng cập nhật thành ". $name_delivery_status;
        $is_view = 0;
        $type = 1;
        $object_id = $order_id;
        $add_notify = mysqli_query($conn, "
            INSERT INTO notification (
                user_id,
                content,
                is_view,
                type,
                object_id,
                created_at
            )
            VALUE (
                '{$user_id}',
                '{$content}',
                '{$is_view}',
                '{$type}',
                '{$object_id}',
                '{$created_at}'
            )
            ");
        function sendMail($email, $body, $subject)
        {
            $mail = new PHPMailer(true);
            $config_email = 'tvkhtest1210@gmail.com';
            $config_pass = 'tvkhtest@1210@';
            $mail->SMTPDebug = 2;
            $mail->IsSMTP(); // set mailer to use SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host = "smtp.gmail.com"; // specify main and backup server
            $mail->Port = 587; // set the port to use
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->SMTPSecure = 'tls';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Username = $config_email; // your SMTP username or your gmail username
            $mail->Password = $config_pass; // your SMTP password or your gmail password
            $from = $config_email; // Reply to this email
            //$to=$email; // Recipients email ID
            $name = 'Male shop'; // Recipient's name
            $mail->setFrom($from, $subject);
            $mail->FromName = 'Male shop'; // Name to indicate where the email came from when the recepient received

            $mail->AddAddress($email, $name);
            // $mail->AddReplyTo($from, $subject);
            $mail->IsHTML(true); // send as HTML
            $mail->Subject = $subject;
            $mail->Body = $body; //HTML Body
            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        }
        $subject = "Cập nhật đơn hàng";
        $body = $content.". Với ghi chú là: ". $note;
        if (isset($order_detail['email'])) {
            $email = $order_detail['email'];
            sendMail($email, $body, $subject);
        }
        $_SESSION['flash'] = 'Cập nhật đơn hàng thành công';
        header('Location: index.php');
    }
    else{
        $_SESSION['flash'] = 'Cập nhật đơn hàng không thành công';
    }
    //Thông báo quá trình lưu
    // $error['register'] = "Đăng ký thông thành công!";
}