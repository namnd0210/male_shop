<?php
	session_start();
	$order_detail = null;
	if (isset($_GET['order_id']) && $_GET['order_id'] != null) {
        include ('../connection.php');
        $order_id = $_GET['order_id'];
		$sql2 = "select * from orders as o where id = $order_id";
        $query2 = $conn->query($sql2);
        $order_detail = mysqli_fetch_array($query2);
		include "controller/update_order.php";
	}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/forms-advanced-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 01:29:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="forms-advanced-inputs.html" />

    <title>Advanced Inputs | AdminKit Demo</title>

    <link href="css/app.css" rel="stylesheet">

    <!-- BEGIN SETTINGS -->
    <script src="js/settings.js"></script>
    <!-- END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-120946860-10', {
        'anonymize_ip': true
    });
    </script>
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar: left (default), right
-->

<body data-theme="default" data-layout="fluid" data-sidebar="left">
    <div class="wrapper">
        <?php include "include/sidebar.php"; ?>

        <div class="main">
            <?php include "include/header.php"; ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Cập nhật trạng thái vận chuyển</strong></h3>
                        </div>

                        <div class="col-auto ml-auto text-right mt-n1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                                    <li class="breadcrumb-item"><a href="index.php">Danh sách đơn hàng</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cập nhật trạng thái vận
                                        chuyển</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <form action="" id="" method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <label class="">TT vận chuyển</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <input name="order_id" value="<?php echo $order_detail['id'] ?>"
                                                            type="text" autocomplete="off" class="form-control" hidden>
                                                        <select class="form-control" id="delivery_status"
                                                            name="delivery_status">
                                                            <option value="">--Chọn TT vận chuyển--</option>
                                                            <option value="0"
                                                                <?php if($order_detail['delivery_status'] == 0) echo "selected" ?>>
                                                                Chờ xác nhận</option>
                                                            <option value="1"
                                                                <?php if($order_detail['delivery_status'] == 1) echo "selected" ?>>
                                                                Đã xác nhận</option>
                                                            <option value="2"
                                                                <?php if($order_detail['delivery_status'] == 2) echo "selected" ?>>
                                                                Đang giao</option>
                                                            <option value="3"
                                                                <?php if($order_detail['delivery_status'] == 3) echo "selected" ?>>
                                                                Đã giao</option>
                                                            <option value="4"
                                                                <?php if($order_detail['delivery_status'] == 4) echo "selected" ?>>
                                                                Đã hủy</option>
                                                        </select>
                                                        <?php echo isset($error['delivery_status']) ? $error['delivery_status'] : ''; ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <label class="">Ghi chú</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <textarea name="note" rows="5" cols="80"
                                                            class="form-control"></textarea>
                                                        <?php echo isset($error['note']) ? $error['note'] : ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <input class="mt-2 btn btn-primary" type="submit" name="update_order"
                                            value="Lưu">
                                        <a href="index.php" class="mt-2 btn btn-danger text-white"><i
                                                class="fa fa-arrow-circle-o-left"></i>
                                            Trở về</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </main>

            <?php include "include/footer.php"; ?>
        </div>
    </div>

    <script src="js/app.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Choices.js
        new Choices(document.querySelector(".choices-single"));
        new Choices(document.querySelector(".choices-multiple"));
        // Flatpickr
        flatpickr(".flatpickr-minimum");
        flatpickr(".flatpickr-datetime", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        flatpickr(".flatpickr-human", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
        flatpickr(".flatpickr-multiple", {
            mode: "multiple",
            dateFormat: "Y-m-d"
        });
        flatpickr(".flatpickr-range", {
            mode: "range",
            dateFormat: "Y-m-d"
        });
        flatpickr(".flatpickr-time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        setTimeout(function() {
            if (localStorage.getItem('popState') !== 'shown') {
                window.notyf.open({
                    type: "success",
                    message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
                    duration: 10000,
                    ripple: true,
                    dismissible: false,
                    position: {
                        x: "left",
                        y: "bottom"
                    }
                });

                localStorage.setItem('popState', 'shown');
            }
        }, 15000);
    });
    </script>
</body>


<!-- Mirrored from demo.adminkit.io/forms-advanced-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 01:29:27 GMT -->

</html>