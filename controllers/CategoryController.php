<?php
	
	require_once "models/Product.php";
	require_once "models/Category.php";
	require_once "models/Size.php";
	require_once "models/Color.php";
	require_once "models/Producer.php";
	
	class CategoryController
	{
		var $products_model;
		var $cats_model;
		var $sizes_model;
		var $colors_model;
		var $producers_model;

		function __construct()
		{
			$this->products_model= new Product();
			$this->sizes_model= new Size();
			$this->colors_model= new Color();
			$this->producers_model= new Producer();
			$this->cats_model= new Category();
		}
		
		function listproduct(){
			$category_id=$_GET['categoryId'];
			$products = $this->cats_model->listproduct($category_id);
			$cats=$this->cats_model->list();
			$colors= $this->colors_model->list();
			$sizes= $this->sizes_model->list();
			$producers= $this->producers_model->list();
			$cats=json_decode($cats);
			$producers=json_decode($producers);
			$colors=json_decode($colors);
			$sizes=json_decode($sizes);
			$products=json_decode($products);
			
			require_once('view/pages/shop/category.php');
		}	
	}
?>