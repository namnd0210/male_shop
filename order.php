<?php
//Khai báo sử dụng session
session_start();
$list_order = [];
$list_order_cho_xac_nhan = [];
$list_order_da_xac_nhan = [];
$list_order_dang_giao = [];
$list_order_da_giao = [];
$list_order_da_huy = [];
if (isset($_SESSION['user_id'])) {
    include 'connection.php';
    $user_id = $_SESSION['user_id'];
    $sql = "select * from orders where user_id = $user_id ORDER BY id DESC ";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
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
    $query_cho_xac_nhan = $conn->query("select * from orders where user_id = $user_id and delivery_status = 0 ORDER BY id DESC ");
    while ($row = $query_cho_xac_nhan->fetch_assoc()) {
        $order_id = $row1['id'];
        $sql2 = "select od.*, od.quantity as order_quantity, p.*,p.name as product_name, p.id as product_id, p.price as product_price from order_detail as od
                JOIN products as p ON od.product_id = p.id
                where od.order_id = $order_id";
        $query2 = $conn->query($sql2);
        $data = [];
        while ($row2 = $query2->fetch_assoc()) {
            $data[] = $row2;
        }
        $row['order_detail'] = $data;
        $list_order_cho_xac_nhan[] = $row;
    }
    $query_da_xac_nhan = $conn->query("select * from orders where user_id = $user_id and delivery_status = 1 ORDER BY id DESC ");
    while ($row = $query_da_xac_nhan->fetch_assoc()) {
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
        $list_order_da_xac_nhan[] = $row;
    }
    $query_dang_giao = $conn->query("select * from orders where user_id = $user_id and delivery_status = 2 ORDER BY id DESC ");
    while ($row = $query_dang_giao->fetch_assoc()) {
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
        $list_order_dang_giao[] = $row;
    }
    $query_da_giao = $conn->query("select * from orders where user_id = $user_id and delivery_status = 3 ORDER BY id DESC ");
    while ($row = $query_da_giao->fetch_assoc()) {
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
        $list_order_da_giao[] = $row;
    }
    $query_da_huy = $conn->query("select * from orders where user_id = $user_id and delivery_status = 4 ORDER BY id DESC ");
    while ($row = $query_da_huy->fetch_assoc()) {
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
        $list_order_da_huy[] = $row;
    }
    echo '<pre>'; print_r($list_order); echo '</pre>';
        // exit;
}
?>

<!DOCTYPE php>
<php lang="zxx">

    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Male_Fashion Template" />
        <meta name="keywords" content="Male_Fashion, unica, creative, php" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Male-Fashion | Template</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
            rel="stylesheet" />

        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
        <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>


        <!-- Header Section Begin -->
        <header class="header">
            <?php include('login.php') ?>
            <?php include('header.php'); ?>
        </header>
        </header>
        <!-- Header Section End -->

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Đơn hàng</h4>
                            <div class="breadcrumb__links">
                                <a href="./index.php">Trang chủ</a>
                                <span>Đơn hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- List order -->
        <div class="list spad">
            <div class="container">
                <div class="list__order row">
                    <!-- user page bar -->
                    <div class="list__order--user-page col-md-3">
                        <div class="user-page-brief row">
                            <div class="avatar">
                                <a href=""><img src="img/avatar/avatar.jpeg" alt="" /></a>
                            </div>
                            <div class="use-page-brief__right">
                                <div class="username">Đức Nam</div>
                                <div class="edit">Chỉnh sửa thông tin</div>
                            </div>
                        </div>
                        <div class="selection">
                            <i class="fa fa-user-secret"></i>
                            <p>Tài khoản của tôi</p>
                        </div>
                        <div class="selection">
                            <i class="fa fa-cart-plus"></i>
                            <p>Đơn hàng</p>
                        </div>
                        <div class="selection">
                            <i class="fa fa-bell"></i>
                            <p>Thông báo</p>
                        </div>
                        <div class="selection">
                            <i class="fa fa-money"></i>
                            <p>Voucher giảm giá</p>
                        </div>
                    </div>

                    <!--nav bar-->
                    <div class="col-md-9">
                        <ul class="nav row" style="background: #f3f2ee;">
                            <li class="nav-item px-2 py-1">
                                <a class="nav-link active" href="#">Đã giao</a>
                            </li>
                            <li class="nav-item px-2 py-1">
                                <a class="nav-link" href="#">Đang giao</a>
                            </li>
                            <li class="nav-item px-2 py-1">
                                <a class="nav-link" href="#">Đã nhận</a>
                            </li>
                            <li class="nav-item px-2 py-1">
                                <a class="nav-link" href="#">Đã Hủy</a>
                            </li>
                        </ul>

                        <!-- order list -->
                        <div class="list__order--list-info">
                            <?php foreach ($list_order as $order) {?>

                            <div class="shop-info row">
                                <p class="shop-name"
                                    style="color: red; border: 1px solid red; padding: 0.25rem 0.5rem; border-radius: 0.5rem;">
                                    <?php echo $order['email']; ?>
                                </p>
                                <div class="d-flex justify-content-end">
                                    <p class="time mr-5" style="align-items: center; display: flex;">
                                        <?php echo $order['created_at']; ?>
                                    </p>
                                    <p class="status"
                                        style="border: 1px solid #59bd1d; padding: 0.25rem 0.5rem; border-radius: 0.5rem;">
                                        <?php echo $order['status']; ?>
                                    </p>
                                </div>
                            </div>

                            <?php foreach ($order['order_detail'] as $item) {?>

                            <div class="list__order--list-item">
                                <div class="item row">
                                    <div class="image pr-3">
                                        <a href=""><img src="${item.image}" alt="" /></a>
                                    </div>
                                    <div class="information">
                                        <div class="information--name">
                                            <?php echo $item['name']; ?>
                                        </div>
                                        <div class="category"> <?php echo $item['category']; ?></div>
                                        <div class="amount">x <?php echo $item['quantity']; ?></div>
                                    </div>
                                    <div class="price">
                                        <div class="price--origin">$<?php echo $item['product_price']; ?></div>
                                        <div class="price--sale">
                                            $<?php echo $item['product_price']*(100-$item['percent_sale'])/100; ?></div>
                                    </div>
                                </div>
                            </div>

                            <?php }?>

                            <div class="list__order--footer mb-2">
                                <button class="btn btn-danger cancel-order" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Hủy đơn hàng
                                </button>
                                <button type="button" class="btn btn-info">Đánh giá</button>
                                <button type="button" class="btn btn-light">
                                    <a href="order-details.php?=<?php echo $order['id']; ?>">Xem chi tiết đơn hàng</a>
                                </button>
                                <div class="cash"><i class="fa fa-money"></i></div>
                                <div class="total">Tổng số tiền: $ <?php echo $order['total_money']; ?></div>
                            </div>
                            <?php }?>
                        </div>

                    </div>
                    <!-- pagination -->
                    <div class="w-100 d-flex justify-content-center my-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Footer Section Begin -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer__about">
                                <div class="footer__logo">
                                    <a href="#"><img src="img/footer-logo.png" alt="" /></a>
                                </div>
                                <p>
                                    Khách hàng là trọng tâm của mô hình kinh doanh độc đáo của chúng tôi, bao gồm cả
                                    thiết
                                    kế.
                                </p>
                                <a href="#"><img src="img/payment.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                            <div class="footer__widget">
                                <h6>Shopping</h6>
                                <ul>
                                    <li><a href="#">Cửa hàng quần áo</a></li>
                                    <li><a href="#">Giày xu hướng</a></li>
                                    <li><a href="#">Phụ kiện</a></li>
                                    <li><a href="#">Giảm giá</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <div class="footer__widget">
                                <h6>Shopping</h6>
                                <ul>
                                    <li><a href="#">Liên hệ chúng tôi</a></li>
                                    <li><a href="#">Phương thức thanh toán</a></li>
                                    <li><a href="#">Vận chuyển</a></li>
                                    <li><a href="#">Hoàn trả</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                            <div class="footer__widget">
                                <h6>NewLetter</h6>
                                <div class="footer__newslatter">
                                    <p>
                                        Hãy là người đầu tiên biết về hàng mới xuất hiện, xem sách, bán hàng và quảng
                                        cáo!
                                    </p>
                                    <form action="#">
                                        <input type="text" placeholder="Your email" />
                                        <button type="submit">
                                            <span class="icon_mail_alt"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-100">
                        <div class="col-lg-12 text-center">
                            <div class="footer__copyright__text">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <p>
                                    Copyright ©
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    2020 All rights reserved | This template is made with
                                    <i class="fa fa-heart-o" aria-hidden="true"></i> by
                                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                </p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal-cancel"></div>
            </footer>
            <!-- Footer Section End -->

            <!-- Js Plugins -->
            <!-- <script type="module" src="js/index.js"></script> -->
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.nice-select.min.js"></script>
            <script src="js/jquery.nicescroll.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/jquery.countdown.min.js"></script>
            <script src="js/jquery.slicknav.js"></script>
            <script src="js/mixitup.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/main.js"></script>
    </body>

</php>