<?php
	session_start();
	$list_order = [];
	include ('../connection.php');
	if (isset($_SESSION['user_id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		$user_id = $_SESSION['user_id'];
		$sql = "select * from orders where `id` > 0 ";
		if(isset($_GET['name']) && $_GET['name'] != null){
			$name = $_GET['name'];
			$sql .="and `name` LIKE '%$name%' ";
		}
		if(isset($_GET['phone']) && $_GET['phone'] != null){
			$phone = $_GET['phone'];
			$sql .="and `phone` LIKE '%$phone%' ";
		}
	
		$sql .="ORDER BY id DESC";
		$query = $conn->query($sql);
		$sum_money = 0;
		while ($row = $query->fetch_assoc()) {
			$sum_money += $row['total_money'];
			$order_id = $row['id'];
			$sql2 = "select od.*, od.quantity as order_quantity, p.*,p.name as product_name, p.id as product_id, p.price as product_price from order_detail as od
					JOIN products as p ON od.product_id = p.id
					where od.order_id = $order_id";
			$query2 = $conn->query($sql2);
			$data = [];
			while ($row2 = $query2->fetch_assoc()) {
				$data[] = $row2;
			}
			$row['order_detail'] = $data;
			$list_order[] = $row;
		}
	}
	// echo '<pre>'; print_r($list_order); echo '</pre>';
    // exit;
?>


<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="index.html" />

    <title>Admin Trang chủ</title>

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
                            <h3><strong>Danh sách đơn hàng</strong></h3>
                        </div>

                        <div class="col-auto ml-auto text-right mt-n1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-12 col-xxl-12 d-flex order-12 order-xxl-12">
                            <div class="card flex-fill w-100">
                                <div class="card-body px-4">
                                    <form action="" id="search_lucky" method="get">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3">
                                                <?php
													$name = null;
													if(isset($_GET['name']))
													{
														$name = trim($_GET['name']);
													}
												?>
                                                <input type="text" name="name" id="name"
                                                    value="<?php if($name != null) echo $name ?>"
                                                    placeholder="Tên khách hàng" class="form-control">
                                            </div>
                                            <div class="col-md-3 col-lg-3">
                                                <?php
													$phone = null;
													if(isset($_GET['phone']))
													{
														$phone = trim($_GET['phone']);
													}
												?>
                                                <input type="text" name="phone" id="phone"
                                                    value="<?php if($phone != null) echo $phone ?>"
                                                    placeholder="Số điện thoại" class="form-control">
                                            </div>
                                            <div class="col-md-3 col-lg-3">
                                                <button type="submit" class="btn btn-primary mr-2 search"><i
                                                        class="fa fa-search"></i> Tìm kiếm</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-xxl-12 d-flex order-12 order-xxl-12">
                            <div class="card flex-fill w-100">
                                <div class="card-body px-4">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3">
                                            <h3>Tổng số đơn hàng: <?php echo count($list_order) ?></h3>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <h3>Tổng số doanh thu: <?php echo $sum_money ?> VNĐ </h3>
                                        </div>
                                        <div class="col-md-3 col-lg-3 d-flex justify-content-end">
                                            <a href="create_order.php">
                                                <button class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Thêm
                                                    mới</button>
                                            </a>

                                            <a href="../index.php">
                                                <button class="btn btn-danger mr-2"> Mua hàng
                                                    tiếp
                                                </button>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Danh sách đơn hàng</h5>
                                </div>
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Họ tên</th>
                                            <th class="d-none d-xl-table-cell">SĐT</th>
                                            <th class="d-none d-xl-table-cell">Email</th>
                                            <th class="d-none d-xl-table-cell">Địa chỉ</th>
                                            <th>Tổng tiền</th>
                                            <th class="d-none d-md-table-cell">TT vận chuyển</th>
                                            <th class="d-none d-md-table-cell">Sản phẩm</th>
                                            <th class="d-none d-md-table-cell">Ngày mua</th>
                                            <th class="d-none d-md-table-cell">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
											$dem=1;
											foreach($list_order as $item){ 
										?>
                                        <tr>
                                            <td><?php echo $dem ?></td>
                                            <td> <a href="order_detail.php?order_id=<?php echo $item['id'] ?>">
                                                    <?php echo $item['code'] ?>
                                                </a>
                                            </td>
                                            <td><?php echo $item['name'] ?></td>
                                            <td><?php echo $item['phone'] ?></td>
                                            <td><?php echo $item['email'] ?></td>
                                            <td><?php echo $item['address'] ?></td>
                                            <td><?php echo $item['total_money'] ?></td>
                                            <td><?php 
													if($item['delivery_status'] == 0)
														echo 'Chờ xác nhận';
													elseif($item['delivery_status'] == 1)
														echo 'Đã xác nhận';
													elseif($item['delivery_status'] == 2)
														echo 'Đang giao';
													elseif($item['delivery_status'] == 3)
														echo 'Đã giao';
													else
														echo 'Đã hủy';
												?></td>
                                            <td><?php echo $item['name'] ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($item['created_at'])) ?></td>
                                            <td>
                                                <?php if($item['user_id'] != null){?>
                                                <a href="update_order.php?order_id=<?php echo $item['id']?>"
                                                    class="btn btn-warning mb-2">
                                                    <i class="fa fa-edit pd-1"> Chỉnh sửa</i>
                                                </a>
                                                <?php } ?>
                                                <?php if($item['status'] == 1){?>
                                                <a href="controller/confirm_order.php?order_id=<?php echo $item['id']?>"
                                                    class="confirm_order"> <button
                                                        class="btn btn-info mb-2">Duyệt</button> </a>
                                                <?php } ?>
                                                <?php if($item['delivery_status'] != 4){?>
                                                <a href="controller/cancel_order.php?order_id=<?php echo $item['id']?>"
                                                    class="cancel_order"> <button class="btn btn-danger mb-2">Hủy
                                                        đơn</button> </a>
                                                <?php } ?>
                                                <a href="controller/delete_order.php?order_id=<?php echo $item['id']?>"
                                                    class="btn btn-secondary delete_order  mb-2"> Xóa đơn </a>
                                            </td>
                                        </tr>
                                        <?php $dem++; }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </main>

            <?php include "include/footer.php"; ?>
        </div>
    </div>

    <script src="js/app.js"></script>
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>

    <script>
    $('.confirm_order').click(function() {
        var x = confirm("Bạn có chắc chắn muốn duyệt đơn hàng này?");
        if (x)
            return true;
        else
            return false;
    });
    $('.cancel_order').click(function() {
        var x = confirm("Bạn có chắc chắn muốn hủy đơn hàng này?");
        if (x)
            return true;
        else
            return false;
    });
    $('.delete_order').click(function() {
        var x = confirm("Bạn có chắc chắn muốn xóa đơn hàng này?");
        if (x)
            return true;
        else
            return false;
    });
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                    "Dec"
                ],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        2115,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                    "Dec"
                ],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var markers = [{
                coords: [31.230391, 121.473701],
                name: "Shanghai"
            },
            {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            },
            {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            },
            {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            },
            {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            },
            {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            },
            {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            },
            {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            },
            {
                coords: [51.507351, -0.127758],
                name: "London"
            },
            {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }
        ];
        var map = new JsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
                initial: {
                    r: 9,
                    strokeWidth: 7,
                    stokeOpacity: .4,
                    fill: window.theme.primary
                },
                hover: {
                    fill: window.theme.primary,
                    stroke: window.theme.primary
                }
            },
            zoomOnScroll: false
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
            nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
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


<!-- Mirrored from demo.adminkit.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 01:28:18 GMT -->

</html>