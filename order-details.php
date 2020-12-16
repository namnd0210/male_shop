<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Male_Fashion Template" />
    <meta name="keywords" content="Male_Fashion, unica, creative, html" />
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
        <?php include('header.php'); ?>
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
                            <a href="./inde.php">Trang chủ</a>
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
            <div class="row">
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

                <!-- order list -->
                <div class="list__order--list-info col-md-9">
                    <div class="">
                        <button class="btn btn-light" style="width: 90px">
                            <i class="fa fa-chevron-left"></i>
                            <a href="order.php" class="">Trở về</a>
                        </button>

                        <div id="timeline-wrap">
                            <div id="timeline"></div>

                            <!-- This is the individual marker-->
                            <div class="marker mfirst timeline-icon one">
                                <i class="fa fa-list"></i>
                                <div class="marker-text">Đơn hàng đã đặt</div>
                            </div>
                            <!-- / marker -->

                            <!-- This is the individual marker-->
                            <div class="marker m2 timeline-icon two">
                                <i class="fa fa-money"></i>
                                <div class="marker-text">Đã xác nhận thông tin thanh toán</div>
                            </div>
                            <!-- / marker -->

                            <!-- This is the individual marker-->
                            <div class="marker m3 timeline-icon three">
                                <i class="fa fa-truck"></i>
                                <div class="marker-text">Đã giao cho ĐVVC</div>
                            </div>
                            <!-- / marker -->

                            <!-- This is the individual marker-->
                            <div class="marker m4 timeline-icon four">
                                <i class="fa fa-envelope"></i>
                                <div class="marker-text">Đã hàng đã nhận</div>
                            </div>

                            <!-- This is the individual marker-->
                            <div class="marker mlast timeline-icon five">
                                <i class="fa fa-hourglass-start"></i>
                                <div class="marker-text">Đánh giá</div>
                            </div>
                            <!-- / marker -->
                        </div>

                        <!-- order-detail-->
                        <div class="order-detail">
                            <div class="header__order-detail d-flex justify-content-between mt-2">
                                <div class="notice">
                                    Đơn hàng này đã hoàn thành. Vui lòng đánh giá các sản phẩm
                                    trước 20-10-2020
                                </div>
                                <button type="button" class="btn btn-info">Đánh giá</button>
                            </div>
                            <div class="middle__order-detail py-4">
                                <div class="shopee-border-delivery"></div>
                                <div class="my-5">
                                    <h2>Địa Chỉ Nhận Hàng</h2>
                                    <div class="pt-4">
                                        <div>Nguyễn Đức Nam</div>
                                        <div>(+84) 898581974</div>
                                        <address>
                                            D office, đường Thành Thái, Phường Dịch Vọng, Quận Cầu
                                            Giấy, Hà Nội
                                        </address>
                                    </div>
                                </div>
                                <div class="shopee-border-delivery"></div>
                            </div>

                            <div class="list__order--list-info">
                                <div class="list__order--list-item">
                                    <div class="item row">
                                        <div class="image pr-3">
                                            <a href=""><img src="img/product/product-2.jpg" alt="" /></a>
                                        </div>
                                        <div class="information">
                                            <div class="information--name">Piqué Biker Jacket</div>
                                            <div class="category">Giày</div>
                                            <div class="amount">x 2</div>
                                        </div>
                                        <div class="price">
                                            <div class="price--origin">$100</div>
                                            <div class="price--sale">$50</div>
                                        </div>
                                    </div>

                                    <div class="item row">
                                        <div class="image pr-3">
                                            <a href=""><img src="img/product/product-1.jpg" alt="" /></a>
                                        </div>
                                        <div class="information">
                                            <div class="information--name">Piqué Biker Jacket</div>
                                            <div class="category">Giày</div>
                                            <div class="amount">x 2</div>
                                        </div>
                                        <div class="price">
                                            <div class="price--origin">$100</div>
                                            <div class="price--sale">$50</div>
                                        </div>
                                    </div>

                                    <div class="item row">
                                        <div class="image pr-3">
                                            <a href=""><img src="img/product/product-3.jpg" alt="" /></a>
                                        </div>
                                        <div class="information">
                                            <div class="information--name">Piqué Biker Jacket</div>
                                            <div class="category">Giày</div>
                                            <div class="amount">x 2</div>
                                        </div>
                                        <div class="price">
                                            <div class="price--origin">$100</div>
                                            <div class="price--sale">$50</div>
                                        </div>
                                    </div>

                                    <div class="row py-5 d-flex justify-content-end" style="font-size: 20px;">
                                        <div class="cash"><i class="fa fa-money pr-2"></i></div>
                                        <div class="total">Tổng số tiền: $450</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                Khách hàng là trọng tâm của mô hình kinh doanh độc đáo của chúng
                                tôi, bao gồm cả thiết kế.
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
                                    Hãy là người đầu tiên biết về hàng mới xuất hiện, xem sách,
                                    bán hàng và quảng cáo!
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
                <div class="row">
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
        </footer>

        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script type="module" src="js/order.js"></script>

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

</html>