<?php
session_start();
if (isset($_GET['order_id']) && $_GET['order_id'] != null && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    include '../../connection.php';
    $order_id = $_GET['order_id'];
    $sql = "DELETE FROM order_history WHERE order_id = $order_id";
    $query = $conn->query($sql);
    $sql1 = "DELETE FROM order_detail WHERE order_id = $order_id";
    $query = $conn->query($sql1);
    $sql2 = "DELETE FROM orders WHERE id = $order_id";
    $query = $conn->query($sql2);
    $_SESSION['flash'] = 'Xóa đơn hàng thành công';
    header('Location: /male_shop/admin/index.php');
}