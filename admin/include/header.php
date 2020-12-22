<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle d-flex">
        <i class="hamburger align-self-center"></i>
    </a>


    <div class="navbar-collapse collapse">
        <?php
							if (isset($_SESSION['flash'])) {
								echo "<h3>".$_SESSION['flash']."</h3>";
								unset($_SESSION['flash']);
							}
						?>
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="bell"></i>
                        <span class="indicator"><?php echo $count_notify?></span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        <?php echo $count_notify ?> thông báo mới
                    </div>
                    <div class="list-group">
                        <?php 
                                        if(isset($list_notify) && count($list_notify) > 0){
                                            foreach($list_notify as $item){
                                    ?>
                        <a href="order_detail.php?order_id=<?php echo $item['object_id'] ?>&notify_id=<?php echo $item['id'] ?>"
                            class="list-group-item" <?php if($item['is_view'] == 0){ ?> style="background: #e9e2e2;"
                            <?php } ?>>
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="text-warning" data-feather="bell"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark"><?php echo $item['content'] ?></div>
                                    <div class="text-muted small mt-1">
                                        <?php echo date('H:i d-m-Y', strtotime($item['created_at'])) ?></div>
                                </div>
                            </div>
                        </a>
                        <?php }}?>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Xem tất cả thông báo</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    <img src="../img/hero/hero-2.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />
                    <span class="text-dark">
                        Đức Nam Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1"
                            data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i>
                        Analytics</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1"
                            data-feather="settings"></i> Settings &
                        Privacy</a>
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help
                        Center</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>