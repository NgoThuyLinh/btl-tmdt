<?php
	// session_start();
	require_once "models/Product.php";
	require_once "models/Category.php";
	require_once "models/Customer.php";
	require_once "models/Image.php";
	include_once('public/guimail/email/email_function.php');

	
	class HomeController
	{
		var $products_model;
		var $cats_model;
		var $customer_model;
		var $img_model;
		function __construct()
		{
			$this->customer_model= new Customer();
			$this->cats_model= new Category();
			$this->products_model= new Product();
			$this->img_model= new Image();
		}
		function contact(){
			$cats = $this->cats_model->list();
			$cats= json_decode($cats);

			require_once('view/pages/shop/contact.php');
		}
		
		function home(){
			$products = $this->products_model->list_new();
			$cats = $this->cats_model->list();
			$products= json_decode($products);
			$product_tops = $this->products_model->list_top();
			$product_tops= json_decode($product_tops);
			$product_news = $this->products_model->list_new();
			$product_news= json_decode($product_news);
			$cats= json_decode($cats);
			$imgs = $this->img_model->list();
			$imgs= json_decode($imgs);
			$sliders = $this->img_model->slider();
			$sliders= json_decode($sliders);
			// var_dump($cats['0']->parent_id);die();
			require_once('view/pages/shop/index.php');
		}
		function loginform(){
			require_once('view/pages/shop/login.php');
		}
		function login(){
			$data['username']=$_POST['username'];
			$data['password']=md5($_POST['password']);
			$result= $this->customer_model->find($data);
			$result= json_decode($result);
			
			if (count($result)<1) {
				header("location: ?mod=home&act=loginform&alert=fail");
			}else{
				$_SESSION['customer']=$result;
				header("location: ?act=home");
			}
		}
		function logout(){
			session_destroy();
			header("location: ?mod=home");
		}

		function singingup(){
			require_once('view/pages/shop/singingup.php');
		}

		function signupstore(){
			// var_dump($_POST['password']);die();
			if ($_POST['password']==$_POST['confirmpassword']) {
				$data['name'] = $_POST['name'];
		        $data['phone'] = $_POST['phone'];
		        $data['email'] = $_POST['email'];
		        $data['address'] = $_POST['address'];
		        $data['username'] = $_POST['username'];
		        $data['password']= md5($_POST['password']);


				$status = $this->customer_model->insert($data);
		        // echo $status;die();
				
				if ($status == 1) {
					setcookie('msg' ,'Đăng kí thành công', time() +2);
					
					
		    
    			  $contents = "Họ và tên:".$_POST['name'] ."<br>"."Số điện thoại:".$_POST['phone']."<br>". "Email:".$_POST['email']."<br>". "Địa chỉ:".$_POST['address']."<br>". "Tên đăng nhập:".$_POST['username']."<br>". "Mật khẩu:".$_POST['password']."<br>";  
		    			 
		    		send_email($_POST['email'],"Hán Dương",$contents,"Thư đăng ký" );
		    		$result= $this->customer_model->find($data);
					$result= json_decode($result);
					
					if (count($result)<1) {
						header("location: ?mod=home&act=loginform&alert=fail");
					}else{
						$_SESSION['customer']=$result;
						header("location: ?act=home");
					}

					// header('Location: ?mod=home&act=loginform');

				}else{
					setcookie('msg' ,'Đăng kí không thành công', time() +2);
				}
				
			}else{
				setcookie('msg1' ,'Mật khẩu không đúng', time() +2);
				header('Location: ?mod=home&act=signup');
			}
		}

			
	}
?>