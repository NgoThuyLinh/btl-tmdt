<?php
	// session_start();
	require_once "models/Product.php";
	require_once "models/Category.php";
	require_once "models/Customer.php";
	
	class HomeController
	{
		var $products_model;
		var $cats_model;
		var $customer_model;
		var $branchs_model;
		function __construct()
		{
			$this->customer_model= new Customer();
			$this->cats_model= new Category();
			$this->branchs_model= new Branch();
			$this->products_model= new Product();
		}
		function contact(){
			require_once('view/pages/shop/contact.php');
		}
		
		function home(){
			$products = $this->products_model->list();
			$cats = $this->cats_model->list();
			$branchs = $this->branchs_model->list();
			$products= json_decode($products);
			$cats= json_decode($cats);
			$branchs= json_decode($branchs);
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
		function selected(){
			$branch=$this->branchs_model->list();
			$branch=json_decode($branch);
			require_once('view/pages/shop/ad.php');
		}	
	}
?>