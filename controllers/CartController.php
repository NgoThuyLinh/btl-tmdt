<?php
	
	require_once "models/Product.php";
	require_once "models/Category.php";
	require_once "models/Size.php";
	require_once "models/Color.php";
	require_once "models/ProductDetail.php";
	require_once "models/Order.php";
	require_once "models/Image.php";
	require_once "models/Address.php";
	
	class CartController
	{
		var $products_model;
		var $cats_model;
		var $sizes_model;
		var $colors_model;
		var $producers_model;
		var $productdetail_model;
		var $order_model;
		var $img_model;
		var $add_model;

		function __construct()
		{
			$this->products_model= new Product();
			$this->sizes_model= new Size();
			$this->colors_model= new Color();
			$this->productdetail_model= new ProductDetail();
			$this->cats_model= new Category();
			$this->order_model= new Order();
			$this->img_model= new Image();
			$this->add_model= new Address();
		}
		
		function listcart(){
			$buy=$_POST['quantity_buy'];
			$product_buy= array('product_code'=>$_GET['product_code'], 'size_id'=>$_POST['size_id'], 'color_id'=>$_POST['color_id'],'quantity_buy'=>$_POST['quantity_buy']);
			$string="location: ?mod=cart";
			if (isset($_SESSION['cart'])==false)
				// kiểm tra cart tồn tại ko
			{

				if (!$this->productdetail_model->findproduct($product_buy['product_code'],$product_buy['size_id'],$product_buy['color_id'],$product_buy['quantity_buy'])) {
					// kiểm tra số lượng hàng mua trong database lớn hơn lượng mua
					$_SESSION['cart']=array();
					array_push($_SESSION['cart'], $product_buy);
						
				}else{
					$string="location: ?mod=product&act=productdetail&productCode=".$product_buy['product_code']."&alert=not";
				}								
			}else{
				$check = 0;
				foreach($_SESSION['cart'] as $key => $spp) {
					if ($spp['product_code'] == $product_buy['product_code'] && $spp['color_id'] == $product_buy['color_id'] && $spp['size_id'] == $product_buy['size_id']) {
						$buy_cart=(int)$spp['quantity_buy']+(int)$buy;
						$check=1;
						if (!$this->productdetail_model->findproduct($product_buy['product_code'],$product_buy['size_id'],$product_buy['color_id'],$buy_cart)) {
							$_SESSION['cart'][$key]['quantity_buy']=$buy_cart;
							break;
						}else{
							$string="location: ?mod=product&act=productdetail&productCode=".$product_buy['product_code']."&alert=not";
							break;
						}
					}	
				}
				if ($check==0) {
					if (!$this->productdetail_model->findproduct($product_buy['product_code'],$product_buy['size_id'],$product_buy['color_id'],$buy)) {
						array_push($_SESSION['cart'], $product_buy);
					}else{
						$string="location: ?mod=product&act=productdetail&productCode=".$product_buy['product_code']."&alert=not";
					}
				}		
			}
			header($string);

		}
		function buy(){
			var_dump($_POST);
			if (!isset($_POST['customer_id'])) {
				$data=array('customer_id'=>null,'customer_name'=>$_POST['customer_name'], 'customer_address'=>$_POST['customer_address'], 'customer_phone'=>$_POST['customer_phone'],'description'=>$_POST['description'], 'city_id'=>$_POST['city_id'],'description'=>$_POST['description'], 'village_id'=>$_POST['village_id'],'customer_email'=>$_POST['customer_email'],'district_id'=>$_POST['district_id']);
			}
			
			var_dump($data);
			$result=$this->order_model->createOrder($data);
			if ($result) {
				unset($_SESSION['cart']);
				header("location: ?act=home&alert=thanhcong");
			}else{
				header("location: ?mod=order&act=checkout&alert=fail");
			}
		}
		function checkout(){
			// if (isset($_SESSION['user'])) {
				$cats= $this->cats_model->list();
				$add= $this->add_model->address();
				$cats= json_decode($cats);
				$data= json_decode($add);
				if (isset($_SESSION['cart'])) {
					foreach ($_SESSION['cart'] as $key => $value) {
						$result=$this->order_model->listproductcart($value);
						$orderdetails[$value['product_code']]=json_decode($result);
					}
				}

				// var_dump($data->city);die();

		
				require_once('view/pages/shop/checkout.php');
			// }else{
			// 	header("location: ?mod=home&act=loginform");
			// }
		}
		
		function cart(){
			$orderdetails=array();
			if (isset($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $key => $value) {
					$result=$this->order_model->listproductcart($value);
					$orderdetails[$value['product_code']]=json_decode($result);
					$img=$this->img_model->img_product_detail($value['product_code'],$value['color_id'],$value['size_id']);
					$img=json_decode($img);

					$_SESSION['cart'][$key]['image']=$img[0]->image;
				}
			}
			require_once('view/pages/shop/cart.php');
		}	
	}
?>