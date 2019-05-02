<?php 
	session_start();
	if (isset($_GET['mod'])) {
		$mod=$_GET['mod'];
	}else{
		$mod='home';
	}
	if (isset($_GET['act'])) {
		$act=$_GET['act'];
	} else {
		$act='list';
	}
	switch ($mod) {
		case 'home':
			include_once('controllers/HomeController.php');
			$home= new HomeController();
			switch ($act) {
				case 'home':
					$home->home();
					break;
				case 'find':
					$home->find();
					break;
				
				case 'loginform':
					$home->loginform();
					break;
				case 'login':
					$home->login();
					break;
				case 'contact':
					$home->contact();
					break;
				
				default:
					$home->home();
					break;
			}
			break;
		case 'user':
			include_once('models/Admin.php');
			include_once('controllers/UserController.php');
			$user = new UserController();
			switch ($act) {
				
				default:
					$user->list();
					break;
			}
			break;
		
		case 'category':
			include_once('models/Category.php');
			include_once('controllers/CategoryController.php');
			$category = new CategoryController();
			switch ($act) {
				
				default:
					$category->listproduct();
					break;
			}
			break;
		case 'order':
			include_once('models/Order.php');
			include_once('controllers/CartController.php');
			$category = new CartController();
			switch ($act) {
				case 'checkout':
					$category->checkout();
					break;
				case 'buy':
					$category->buy();
					break;
				
				default:
					$category->listcart();
					break;
			}
			break;
		case 'cart':
			include_once('models/Order.php');
			include_once('controllers/CartController.php');
			$category = new CartController();
			switch ($act) {
				
				
				default:
					$category->cart();
					break;
			}
			break;
		case 'product':
			include_once('models/Product.php');
			include_once('controllers/ProductController.php');
			$category = new ProductController();
			switch ($act) {
				case 'productdetail':
					$category->detail();
					break;
				default:
					$category->list();
					break;
			}
			break;
		default:
			$mod='home';
			break;
	}
?>