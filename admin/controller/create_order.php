<?php
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
//Nếu không phải là sự kiện đăng ký thì không xử lý
if (isset($_POST['create_order']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $product_id = $_POST['product_id'];
    $error = array();
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $code = '';
    for ($i = 0; $i < 10; $i++) {
        $code .= $characters[rand(0, $charactersLength - 1)];
    }
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ($name == null) {
        $error['name'] = 'Bạn chưa nhập họ tên';
    }
    if ($address == null) {
        $error['address'] = 'Bạn chưa nhập địa chỉ';
    }
    if ($email == null) {
        $error['email'] = 'Bạn chưa nhập email';
    }
    if ($phone == null) {
        $error['phone'] = 'Bạn chưa nhập phone';
    }
    if ($product_id == null) {
        $error['product_id'] = 'Bạn chưa chọn sản phẩm';
    }
    if (!$error) {
        $total_money = 0;
        $status = 2;
        $delivery_status = 3;
        $type_buy = 2;
        $created_at = date('Y-m-d H:i:s');
        foreach ($product_id as $id) {
            $sql = "select * from products where id = $id";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);
            if ($row['is_sale'] == 1) {
                $total_money += $row['price'] - $row['price'] * $row['percent_sale'] / 100;
            } else {
                $total_money += $row['price'];
            }
        }
        //Lưu thông tin thành viên vào bảng
        $addorder = mysqli_query($conn, "
        INSERT INTO orders (
            code,
            total_money,
            status,
            name,
            email,
            phone,
            address,
            delivery_status,
            type_buy,
            created_at
        )
        VALUE (
            '{$code}',
            '{$total_money}',
            '{$status}',
            '{$name}',
            '{$email}',
            '{$phone}',
            '{$address}',
            '{$delivery_status}',
            '{$type_buy}',
            '{$created_at}'
        )
        ");
        $order_id = mysqli_insert_id($conn);
        
        foreach ($product_id as $id) {
            $quantity = 1;
            $price = 0;
            $sql3 = "select * from products where id = $id";
            $query3 = $conn->query($sql3);
            $row3 = mysqli_fetch_array($query3);
            if ($row['is_sale'] == 1) {
                $price = $row['price'] - $row['price'] * $row['percent_sale'] / 100;
            } else {
                $price = $row['price'];
            }
            $sale = $row['percent_sale'];
            $addorder_detail = mysqli_query($conn, "
            INSERT INTO order_detail (
                order_id,
                product_id,
                quantity,
                price,
                sale,
                created_at
            )
            VALUE (
                '{$order_id}',
                '{$id}',
                '{$quantity}',
                '{$price}',
                '{$sale}',
                '{$created_at}'
            )
            ");
        }
        function sendMail($email, $body, $subject)
        {
            $mail = new PHPMailer(true);
            $config_email = 'thongbao.bestbank@gmail.com';
            $config_pass = 'bestbank@123';
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
            $name = 'Shop Online'; // Recipient's name
            $mail->setFrom($from, $subject);
            $mail->FromName = 'Shop Online'; // Name to indicate where the email came from when the recepient received

            $mail->AddAddress($email, $name);
            $mail->AddReplyTo($from, $subject);
            $mail->IsHTML(true); // send as HTML
            $mail->Subject = $subject;
            $mail->Body = $body; //HTML Body
            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        }
        $subject = "Shop Online của HUY thông báo";
        $body = 'Đơn hàng ' . $code . ' của bạn đã được shop tạo. Cảm ơn bạn đã mua hàng của shop';
        if (isset($email)) {
            sendMail($email, $body, $subject);
        }
        $_SESSION['flash'] = 'Tạo đơn hàng thành công';
        header('Location: index.php');
    }
    else{
        $_SESSION['flash'] = 'Tạo đơn hàng không thành công';
        header('Location: index.php');
    }
}