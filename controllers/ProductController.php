<?php
	
	require_once "models/Product.php";
	require_once "models/Category.php";
	require_once "models/Size.php";
	require_once "models/Color.php";
	require_once "models/Image.php";
	
	class ProductController
	{
		var $products_model;
		var $cats_model;
		var $sizes_model;
		var $colors_model;
		var $producers_model;
		var $imgs_model;

		function __construct()
		{
			$this->products_model= new Product();
			$this->sizes_model= new Size();
			$this->colors_model= new Color();
			$this->cats_model= new Category();
			$this->imgs_model= new Image();
		}
		
		function detail(){
			$product_code=$_GET['productCode'];
			$product = $this->products_model->find($product_code);
			$colors= $this->colors_model->color_product_detail($product_code);
			$cats= $this->cats_model->list();
			$sizes= $this->sizes_model->size_product_detail($product_code);
			$imgs= $this->imgs_model->list();
			$colors=json_decode($colors);
			$sizes=json_decode($sizes);
			$cats=json_decode($cats);
			$product=json_decode($product);
			$imgs=json_decode($imgs);
			require_once('view/pages/shop/product-detail.php');
		}

	}
?>