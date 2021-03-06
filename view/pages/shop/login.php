
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<?php if (isset($_COOKIE['msg'])) { ?>
		            <div class="alert alert-danger">
		                 <?php echo $_COOKIE['msg']?>;
		            </div>
		         <?php } ?>
				<h3>Đăng nhập</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="?mod=home&act=login" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="username" type="text" class="form-control" placeholder="">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" type="password" class="form-control" placeholder="">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Nhớ mật khẩu
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn" name="Đăng nhập">
					</div>
				</form>
			</div>
			<!-- <div class="card-footer">
				<div class="d-flex justify-content-center links">
					Bạn không có tài khoản?<a href="#">Đăng kí</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Quên mật khẩu?</a>
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
