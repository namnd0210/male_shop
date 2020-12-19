<?php
//Khai báo sử dụng session
// session_start(); 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['login'])) 
{
    //Kết nối tới database
    include('connection.php');
     
    //Lấy dữ liệu nhập vào
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$email || !$password) {
        echo "Vui lòng nhập đầy đủ email và mật khẩu";
        exit;
    }
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "select * from users where email = '$email' and password = '$password' ";
	$query = mysqli_query($conn,$sql);
	$num_rows = mysqli_num_rows($query);
	if ($num_rows==0) {
        echo "tên đăng nhập hoặc mật khẩu không đúng !";
        exit;
	}else{
        $row = mysqli_fetch_array($query);
		//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $row['name'];
		$_SESSION['phone'] = $row['phone'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['is_admin'] = $row['is_admin'];
        // Thực thi hành động sau khi lưu thông tin vào session
        // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
        if($row['is_admin'] == 1){
            header('Location: /male_shop/admin/index.php');
        }else{
            header('Location: order.php');
        }
        
    }
}
?>


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Đăng nhập
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="index.php">
                                    <div class="form-group row">
                                        <label for="email" class="col-md-12 col-form-label ">Email</label>
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" value=""
                                                required autocomplete="email" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-12 col-form-label ">Mật
                                            khẩu</label>
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password"
                                                required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <button class="btn btn-primary" type='submit' name="login">Đăng
                                                nhập</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>