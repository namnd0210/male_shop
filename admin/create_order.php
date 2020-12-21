<?php
	session_start();
	$list_product = [];
	if (isset($_SESSION['user_id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		include ('../connection.php');
		$sql = "select * from products";
		$query = $conn->query($sql);
		while ($row = $query->fetch_assoc()) {
			$list_product[] = $row;
		}
		include "controller/create_order.php";
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

	<!-- BEGIN SETTINGS -->
	<script src="js/settings.js"></script>
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
        <?php include "include/sidebar.php"; ?>

		<div class="main">
        <?php include "include/header.php"; ?>

			<main class="content">
				<div class="container-fluid p-0">

                    <div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Thêm mới đơn hàng</strong></h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="index.php">Danh sách đơn hàng</a></li>
									<li class="breadcrumb-item active" aria-current="page">Thêm mới đơn hàng</li>
								</ol>
							</nav>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
                        <form action="create_order.php" id="search_lucky" method="post">
							<div class="card">
								<!-- <div class="card-header">
									<h5 class="card-title">Choices.js</h5>
									<h6 class="card-subtitle text-muted">A vanilla, lightweight, configurable select box/text input plugin.</h6>
								</div> -->
								<div class="card-body">
									<div class="mb-3" style="display: none">
										<select class="form-control choices-single">
											<optgroup label="Alaskan/Hawaiian Time Zone">
												<option value="AK">Alaska</option>
												<option value="HI">Hawaii</option>
											</optgroup>
											<optgroup label="Pacific Time Zone">
												<option value="CA">California</option>
												<option value="NV">Nevada</option>
												<option value="OR">Oregon</option>
												<option value="WA">Washington</option>
											</optgroup>
											<optgroup label="Mountain Time Zone">
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="MT">Montana</option>
												<option value="NE">Nebraska</option>
												<option value="NM">New Mexico</option>
												<option value="ND">North Dakota</option>
												<option value="UT">Utah</option>
												<option value="WY">Wyoming</option>
											</optgroup>
											<optgroup label="Central Time Zone">
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="IL">Illinois</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="MN">Minnesota</option>
												<option value="MS">Mississippi</option>
												<option value="MO">Missouri</option>
												<option value="OK">Oklahoma</option>
												<option value="SD">South Dakota</option>
												<option value="TX">Texas</option>
												<option value="TN">Tennessee</option>
												<option value="WI">Wisconsin</option>
											</optgroup>
											<optgroup label="Eastern Time Zone">
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="IN">Indiana</option>
												<option value="ME">Maine</option>
												<option value="MD">Maryland</option>
												<option value="MA">Massachusetts</option>
												<option value="MI">Michigan</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NY">New York</option>
												<option value="NC">North Carolina</option>
												<option value="OH">Ohio</option>
												<option value="PA">Pennsylvania</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="VT">Vermont</option>
												<option value="VA">Virginia</option>
												<option value="WV">West Virginia</option>
											</optgroup>
										</select>
									</div>
                                    <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <label class="">Tên Khách hàng</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <input name="name" placeholder="Tên khách hàng" value="" type="text" autocomplete="off"
                                                            class="form-control" required>
														<?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                                            <label class="">Số điện thoại</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                                            <input type="text"  placeholder="Nhập SĐT" value="" autocomplete="off"  title="Nhập SĐT" name="phone" class="form-control"  required>
															<?php echo isset($error['phone']) ? $error['phone'] : ''; ?>
                                                        </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <label class="">Địa chỉ</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <input type="text"  placeholder="Nhập địa chỉ" value="" autocomplete="off"  title="Nhập địa chỉ" name="address" class="form-control">
														<?php echo isset($error['address']) ? $error['address'] : ''; ?>
													</div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <label class="">email</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <input type="text"  placeholder="Nhập email" value="" autocomplete="off"  title="Nhập email" name="email" class="form-control" >
                                                        <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <label class="">Sản phẩm</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <select class="form-control choices-multiple" multiple id="product_id"
                                                            name="product_id[]">
                                                        <option value="">--Chọn sản phẩm--</option>
                                                            <?php foreach($list_product as $p){ ?>
                                                                    <option value="<?php echo $p['id'] ?>"
                                                                    ><?php echo $p['name'].'- Mã:'.$p['code'] ?></option>
															<?php } ?>
                                                        </select>
														<?php echo isset($error['product_id']) ? $error['product_id'] : ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input class="mt-2 btn btn-primary" type="submit" name="create_order" value="Lưu">
                                    <a href="index.php" class="mt-2 btn btn-danger text-white"><i class="fa fa-arrow-circle-o-left"></i>
                                        Trở về</a>
                                </div>
                            </div>
                        </form>
						</div>

						<!-- <div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Input Masks</h5>
									<h6 class="card-subtitle text-muted">A vanilla javascript library which creates an input mask.</h6>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-lg-6">
											<div class="mb-3">
												<label class="form-label">Date</label>
												<input type="text" class="form-control" data-inputmask-alias="datetime"
													data-inputmask-inputformat="dd/mm/yyyy" />
												<span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>
											</div>
											<div class="mb-3">
												<label class="form-label">Date</label>
												<input type="text" class="form-control" data-inputmask-alias="datetime"
													data-inputmask-inputformat="mm/dd/yyyy" />
												<span class="font-13 text-muted">e.g "MM/DD/YYYY"</span>
											</div>
											<div class="mb-3">
												<label class="form-label">Currency</label>
												<input type="text" class="form-control"
													data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': '€ ', 'placeholder': '0'" />
												<span class="font-13 text-muted">e.g "€ 9,95"</span>
											</div>
											<div class="mb-3">
												<label class="form-label">Currency</label>
												<input type="text" class="form-control"
													data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" />
												<span class="font-13 text-muted">e.g "$ 9,95"</span>
											</div>
										</div>
										<div class="col-12 col-lg-6">
											<div class="mb-3">
												<label class="form-label">License Plate</label>
												<input type="text" class="form-control" data-inputmask-mask="[9-]AAA-999" />
												<span class="font-13 text-muted">e.g "9-ABC-123"</span>
											</div>
											<div class="mb-3">
												<label class="form-label">Decimal</label>
												<input type="text" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': ','" />
												<span class="font-13 text-muted">e.g "123,456,789"</span>
											</div>
											<div class="mb-3">
												<label class="form-label">IP Address</label>
												<input type="text" class="form-control" data-inputmask="'alias': 'ip'" />
												<span class="font-13 text-muted">e.g "123.123.123.123"</span>
											</div>
											<div class="mb-3">
												<label class="form-label">Email Address</label>
												<input type="text" class="form-control" data-inputmask="'alias': 'email'" />
												<span class="font-13 text-muted">e.g "support@adminkit.io"</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
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