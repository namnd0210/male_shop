<?php
session_start();
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

session_start();
if (isset($_GET['order_id']) && $_GET['order_id'] != null && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    include '../../connection.php';
    $order_id = $_GET['order_id'];
    $sql = "UPDATE orders SET status = 2 WHERE id = $order_id";
    $query = $conn->query($sql);
    $sql2 = "select * from orders as o where id = $order_id";
    $query2 = $conn->query($sql2);
    $order_detail = mysqli_fetch_array($query2);
    $user_id = $order_detail['user_id'];
    $content = 'Đơn hàng ' . $order_detail['code'] . ' của bạn đã được chủ shop duyệt';
    $is_view = 0;
    $type = 1;
    $object_id = $order_id;
    $created_at = date('Y-m-d H:i:s', time());
    $addnotify = mysqli_query($conn,"
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
    $subject = "Xác nhận đơn hàng";
    $body = 'Đơn hàng ' . $order_detail['code'] . ' của bạn đã được chủ shop duyệt';
    if (isset($order_detail['email'])) {
        $email = $order_detail['email'];
        // sendMail($email, $body, $subject);
    }
    $_SESSION['flash'] = 'Duyệt đơn hàng thành công';
    header('Location: /male_shop/admin/index.php');
}