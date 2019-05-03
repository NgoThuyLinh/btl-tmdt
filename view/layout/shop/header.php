<?php 
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="public/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="public/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="public/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="public/css/flaticon.css"/>
	<link rel="stylesheet" href="public/css/slicknav.min.css"/>
	<link rel="stylesheet" href="public/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="public/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="public/css/animate.css"/>
	<link rel="stylesheet" href="public/css/style.css"/>
	<style type="text/css" media="screen">
		body{
			font-family: Arial;
		}
	</style>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="?mod=home&act=home" class="site-logo">
							<img src="public/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Tìm kiếm">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<?php if(!isset($_SESSION['customer'])) { ?>
									<i class="flaticon-profile"></i>
									<a href="?mod=home&act=loginform">Đăng nhập</a>
								<?php } else{ ?>
									<p><?= $_SESSION['customer'][0]->name?></p>
								<?php } ?>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<?php 
										$count = 0;
										if (isset($_SESSION['cart'])) {
											$count = count($_SESSION['cart']);
									} ?>
									<span><?= $count?></span>
								</div>
								<a href="?mod=cart">Giỏ hàng</a>
							</div>
							<?php if(isset($_SESSION['customer'])) { ?>
								<div class="up-item" style="margin-left: 20px;cursor: pointer;"><i class="fab fa-accusoft"></i><a href="?mod=home&act=logout">Đăng xuất</a></div>
							<?php } else { ?>
								<div class="up-item" style="margin-left: 18px;cursor: pointer;"><i class="fab fa-accusoft"></i><a href="?mod=home&act=signup">Đăng ký</a></div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="?">Trang chủ</a></li>
					<?php if (isset($cats)) {
						foreach ($cats as $key => $value) {
							if ($value->parent_id==null) {
							
					?>
					<li><a href="?mod=category&act=category&categoryId=<?=$value->id?>"><?=$value->name?></a>
						
					<?php 
							}
							echo "<ul class='sub-menu'>";
							foreach ($cats as $k) {
								if ($k->parent_id==$value->id) {
									
					?>
						<li><a href="?mod=category&act=category&categoryId=<?=$k->id?>"><?=$k->name?></a></li>
						
					<?php
								}
							}
						echo "</ul></li>";
						}

					}?>
					<li><a href="?mod=home&act=contact">Liên hệ</a></li>
					<li><a href="?mod=home&act=blog">Tin tức</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->
