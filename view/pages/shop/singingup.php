
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Trang đăng ký</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="publics/css/login.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<?php if (isset($_COOKIE['msg1'])) { ?>
            <div class="alert alert-danger">
                 <?php echo $_COOKIE['msg1']?>;
            </div>
          <?php } ?>
			<div class="card-header">
				<h3>Đăng ký</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="?mod=home&act=signupstore" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend" >
							<span class="input-group-text" style="width: 150px">Họ tên</i></span>
						</div>
						<input name="name" type="text" class="form-control" placeholder="">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend" >
							<span class="input-group-text" style="width: 150px">Email</i></span>
						</div>
						<input name="email" type="email" class="form-control" placeholder="">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend" >
							<span class="input-group-text" style="width: 150px">Địa chỉ</i></span>
						</div>
						<input name="address" type="text" class="form-control" placeholder="">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend" >
							<span class="input-group-text" style="width: 150px">Số điện thoại</i></span>
						</div>
						<input name="phone" type="number" class="form-control" placeholder="">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text" style="width: 150px">Tên đăng nhập </i></span>
						</div>
						<input name="username" type="text" class="form-control" placeholder="">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend" >
							<span class="input-group-text" style="width: 150px">Mật khẩu</i></span>
						</div>
						<input name="password" type="password" class="form-control" placeholder="">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend" >
							<span class="input-group-text" style="width: 150px">Xác nhận mật khẩu</i></span>
						</div>
						<input name="confirmpassword" type="password" class="form-control" placeholder="">
					</div>
					<div class="row align-items-center remember">
						<!-- <input type="checkbox"> -->
					</div>
					<div class="form-group">
						<input type="submit" value="Đăng ký" class="btn float-right login_btn" name="Đăng ký">
					</div>
				</form>
			</div>
			<!-- <div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign U</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
</body>
</html>
<?php 
	if (isset($_GET['alert'])=='fail') {
		echo "<script type='text/javascript'>alert('Đăng nhập không thành công');</script>";
		
	}
 ?>
