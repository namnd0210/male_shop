<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
                <div class="header__top__left">
                    <p>
                        Miễn phí vận chuyển, hoàn trả trong 30 ngày hoặc đảm bảo hoàn
                        lại tiền.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="header__top__right">
                    <div class="header__top__links">
                        <?php
                                if (isset($_SESSION['name'])) {
                                    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
                                        echo '<a href="admin/index.php" class="mr-2"><i class="fa fa-user mr-2"></i>'.$_SESSION['name'].'</a>';
                                    }
                                    else{
                                        echo '<a href="order_user.php" class="mr-2"><i class="fa fa-user mr-2"></i>'.$_SESSION['name'].'</a>';
                                    }
                                    echo '<a href="/male_shop/logout.php">Đăng xuất</a>';
                                }
                                else{
                                    echo '<a href="javascript:" class="mr-2" class="action" data-toggle="modal" data-target="#loginModal">Đăng nhập</a>';
                                    echo '<a href="register.php" class="mr-2">Đăng ký</a>';
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="header__logo">
                <a href="./index.php"><img src="img/logo.png" alt="" /></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="active"><a href="./index.php">Trang chủ </a></li>
                    <li><a href="./#">Shop</a></li>
                    <li>
                        <a href="#">Trang</a>
                        <ul class="dropdown">
                            <li><a href="./#">Thông tin về chúng tôi</a></li>
                            <li><a href="./#">Chi tiết cửa hàng</a></li>
                            <li><a href="./#">Giỏ hàng</a></li>
                            <li><a href="./#">Check Out</a></li>
                            <li><a href="./#">Blog</a></li>
                        </ul>
                    </li>
                    <li><a href="./#">Liên hệ</a></li>
                    <li><a href="./order.php">Đơn hàng</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="header__nav__option">
                <a href="#" class="search-switch"><img src="img/icon/search.png" alt="" /></a>
                <a href="#"><img src="img/icon/heart.png" alt="" /></a>
                <a href="#"><img src="img/icon/cart.png" alt="" /> <span>0</span></a>
                <div class="price">$0.00</div>
            </div>
        </div>
    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
</div>