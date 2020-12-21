<?php
session_start();
$row = null;
if (isset($_GET['order_id']) && $_GET['order_id'] != null && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    include '../connection.php';
    $order_id = $_GET['order_id'];
    $sql = "select * from orders as o where id = $order_id";
    $query = $conn->query($sql);
    $row = mysqli_fetch_array($query);
    $sql2 = "select od.*, od.quantity as order_quantity, p.*,p.name as product_name, p.id as product_id, p.price as product_price from order_detail as od
                JOIN products as p ON od.product_id = p.id
                where od.order_id = $order_id";
    $query2 = $conn->query($sql2);
    $data = [];
    while ($row2 = $query2->fetch_assoc()) {
        $data[] = $row2;
    }
    $row['order_detail'] = $data;
    $sql3 = "select * from order_history where order_id = $order_id ORDER BY id DESC ";
    $query3 = $conn->query($sql3);
    $data1 = [];
    while ($row3 = $query3->fetch_assoc()) {
        $data1[] = $row3;
    }
    $row['order_history'] = $data1;
    if(isset($_GET['notify_id'])){
        $notify_id = $_GET['notify_id'];
        $sql4 = "UPDATE `notification` SET is_view = 1 WHERE id = $notify_id";
        $query4 = $conn->query($sql4);
    }
    include "controller/update_order.php";
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/forms-advanced-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 01:29:27 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="forms-advanced-inputs.html" />

	<title>Advanced Inputs | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../style.css">
	<!-- BEGIN SETTINGS -->
	<script src="js/settings.js"></script>
    <style>
        .navbar-expand .navbar-nav .dropdown-menu-right {
            right: 0;
            left: auto;
            width: 320px;
        }
    </style>
	<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
</script></head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar: left (default), right
-->

<body data-theme="default" data-layout="fluid" data-sidebar="left">
	<div class="wrapper">
        <?php include "include/sidebar.php";?>

		<div class="main">
        <?php include "include/header.php";?>

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
									<li class="breadcrumb-item active" aria-current="page">Cập nhật trạng thái vận chuyển</li>
								</ol>
							</nav>
						</div>
					</div>

					<div class="row shop-tracking-status">

                    <div class="col-12 col-md-6">
                        <div class="order-status">

                        <div class="order-status-timeline">
                            <!-- class names: c0 c1 c2 c3 and c4 -->
                            <div class="order-status-timeline-completion c3"
                                <?php
                                    if ($row['delivery_status'] == 0) {
                                        echo 'style="width: 22%;"';
                                    } elseif ($row['delivery_status'] == 1) {
                                        echo 'style="width: 45%;"';
                                    } elseif ($row['delivery_status'] == 2) {
                                        echo 'style="width: 70%;"';
                                    } elseif ($row['delivery_status'] == 3) {
                                        echo 'style="width: 100%;"';
                                    } else {
                                        echo 'style="width: 0%;"';
                                    }

                                ?>
                            ></div>
                        </div>

                        <div class="image-order-status image-order-status-new active img-circle">
                            <span class="status">Đã đặt hàng</span>
                            <div class="icon"></div>
                        </div>
                        <div class="image-order-status image-order-status-active active img-circle">
                            <span class="status">Chờ xác nhận</span>
                            <div class="icon"></div>
                        </div>
                        <div class="image-order-status image-order-status-intransit active img-circle">
                            <span class="status">Đã xác nhận</span>
                            <div class="icon"></div>
                        </div>
                        <div class="image-order-status image-order-status-delivered active img-circle">
                            <span class="status">Đang giao hàng</span>
                            <div class="icon"></div>
                        </div>
                        <div class="image-order-status image-order-status-completed active img-circle">
                            <span class="status">Đã giao hàng</span>
                            <div class="icon"></div>
                        </div>

                    </div>
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-page-heading">
                                <h5>Địa chỉ nhận hàng</h5>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="first_name">Họ và tên<span></span></label>
                                        <input type="text" class="form-control" id="first_name" value="<?php echo $row['name'] ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone_number">Số điện thoại<span>*</span></label>
                                        <input type="number" class="form-control" id="phone_number" min="0" value="<?php echo $row['phone'] ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="email_address">Địa chỉ email<span>*</span></label>
                                        <input type="email" class="form-control" id="email_address" value="<?php echo $row['email'] ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="street_address">Địa chỉ <span>*</span></label>
                                        <input type="text" class="form-control mb-3" id="street_address" value="<?php echo $row['address'] ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button type="button" class="btn btn-danger">Mua thêm lần nữa</button>
                                    </div>
                                </div>
                            </form>
                            <div class="border-delivery"></div>
                            <div class="row mt-3 delivery-detail">
                                <div class="col-md-3" style="text-align: center;border-right: 1px solid #ff084e;">
                                    <p style="font-size: 18px">J&T Express <br>
                                    812030122051</p>
                                </div>
                                <div class="col-md-9">
                                    <ul>
                                        <?php
                                            $dem = 1;
                                            foreach ($row['order_history'] as $i) {
                                        ?>
                                        <li
                                        <?php
                                            if ($dem == 1) {
                                                echo 'style="color: red"';
                                            } else {
                                                echo 'style="color: #d8d8d8"';
                                            }

                                        ?>
                                        ><i class="fa fa-circle mr-3"></i> <?php echo date('H:i d-m-Y', strtotime($i['created_at'])) ?> <?php echo $i['note'] ?></li>
                                        <?php
                                            $dem++;
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">

                            <div class="cart-page-heading">
                                <h5>Đơn hàng của bạn <span style="color: #ff084e">
                                    <?php
                                        if ($row['delivery_status'] == 0) {
                                            echo 'Chờ xác nhận';
                                        } elseif ($row['delivery_status'] == 1) {
                                            echo 'Đã xác nhận';
                                        } elseif ($row['delivery_status'] == 2) {
                                            echo 'Đang giao';
                                        } elseif ($row['delivery_status'] == 3) {
                                            echo 'Đã giao';
                                        } else {
                                            echo 'Đã hủy';
                                        }

                                    ?>
                                    </span>
                                </h5>
                                <p>chi tiết</p>
                            </div>

                            <ul class="order-details-form mb-4" style="border: none">
                                <li><span>Mã đơn hàng</span> <span><?php echo $row['code'] ?></span></li>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                                <ul class="checkout__total__products" style="margin-bottom: 0px">
                                    <?php
                                        $dem = 1;
                                        foreach ($row['order_detail'] as $item) {
                                    ?>
                                        <li style="margin-bottom: 0px; border:none"><samp><?php echo $dem ?>.</samp> <?php echo $item['product_name'] . " x " . $item['quantity'] ?><span><?php echo number_format($item['price']) ?> VNĐ</span></li>
                                        <?php
                                            $dem++;
                                            }
                                        ?>
                                </ul>
                                <ul class="checkout__total__all" style="border:none">
                                    <li>Tổng tiền <span><?php echo number_format($row['total_money']) ?> VNĐ</span></li>
                                </ul>
                            </ul>
                            <a href="index.php" title="Xem chi tiết đơn hàng">
                                <button type="button" class="btn btn-info">Trở về</button>
                            </a>
                        </div>
                    </div>

                </div>

				</div>
			</main>

			<?php include "include/footer.php";?>
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
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
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

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script></body>


<!-- Mirrored from demo.adminkit.io/forms-advanced-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 01:29:27 GMT -->
</html>