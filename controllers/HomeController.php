<?php
	// session_start();
	require_once "models/Product.php";
	require_once "models/Category.php";
	require_once "models/Customer.php";
	require_once "models/Image.php";
	
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
			require_once('view/pages/shop/contact.php');
		}
		
		function home(){
			$products = $this->products_model->list_new();
			$cats = $this->cats_model->list();
			$products= json_decode($products);
			$product_tops = $this->products_model->list_top();
			$product_tops= json_decode($product_tops);
			$cats= json_decode($cats);
			$imgs = $this->img_model->list();
			$imgs= json_decode($imgs);
			$sliders = $this->img_model->slider();
			$sliders= json_decode($sliders);
			require_once('view/pages/shop/index.php');
		}
		function loginform(){
			require_once('view/pages/shop/login.php');
		}
		function login(){
			$data=$_POST;
			$result= $this->customer_model->find($data);
			$result= json_decode($result);
			
			if (count($result)<1) {
				header("location: ?mod=home&act=loginform&alert=fail");
			}else{
				$_SESSION['user']=$result;
				header("location: ?act=home");
			}
		}
		function logout(){
			session_destroy();
			header("location: ?mod=home");
		}
			
	}
?>