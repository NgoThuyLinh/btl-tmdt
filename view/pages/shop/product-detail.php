<?php 
	include('view/layout/shop/header.php');
 ?>

<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category PAge</h4>
			<div class="site-pagination">
				<a href="">Trang chủ</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="?mod=category&categoryId=1"> &lt;&lt; Trở lại danh mục</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<?php 
							foreach ($imgs as $k) {
								if ($k->product_id== $product[0]->id) {
									
								
						 ?>
						<img src="<?=$k->image?>" alt="" width = "100%" height = "600px" >
						<?php break;}} ?>
					</div>
					
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?=$product[0]->name?></h2>
					<h3 class="p-price"><?=$product[0]->price?> đ</h3>
					<h4 class="p-stock">Available:<span><?php if ($product[1]==true ) { echo "In Stock";
					}else{echo "Not in stock";}?></span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 đánh giá</a>|<a href="">Thêm đánh giá sản phẩm</a>
					</div>
					<form action="?mod=order&product_code=<?=$_GET['productCode']?>" method="POST" accept-charset="utf-8" name="carts">
						<div class="fw-color-choose">
							<p>Color</p>
							<?php 
								if (isset($colors)) {
									foreach ($colors as $key => $value) {
										
							 ?>
							<div class="cs-item">
								<input type="radio" name="color_id" id="<?=$value->color?>-color" value="<?=$value->color_id?>">
								<label class="cs-<?=$value->color?>" for="<?=$value->color?>-color">
								</label>
							</div>
							<?php
									}
								}
							 ?>
							
						</div>
						<div class="fw-size-choose">
							<p>Size</p>
							<?php 
								if (isset($sizes)) {
									foreach ($sizes as $key => $value) {	
							 ?>
							<div class="sc-item">
								<input type="radio" name="size_id" id="<?=$value->size?>-size" value="<?=$value->size_id?>">
								<label for="<?=$value->size?>-size"><?=$value->size?></label>
							</div>
							<?php 
									}
								}
							 ?>
							
						</div>
						
						<div class="quantity">
							<p>Quantity</p>
	                        <div class="pro-qty"><input type="text" value="1" name="quantity_buy"></div>
	                    </div>
						<button type="submit" class="site-btn" name="order">Mua hàng</button>
					</form>
					
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Thông tin mô tả</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p><?=$product[0]->description?></p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="public/img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


<?php 
	include('view/layout/shop/footer.php');
	if (isset($_GET['alert'])) {
		echo "<script type='text/javascript'>alert('Số lượng mua quá lớn');</script>";
	}
?>

<script type="text/javascript">
	
	$(document).ready(function(){
		var color_id;
		var result;
		$('input[name="color_id"]').change(function(e) { 

		    color_id= $(this).val();
		   $.ajax({
		   		url: "?mod=product&act=img",
		   		method: "GET",
		   		data:{
		   			'color_id': color_id,
		   			'code': '<?=$_GET['productCode']?>'
		   		},
		   		success: function(a){
		   			result = JSON.parse(a);
			    	console.log(result)
			    	result.forEach(function(element) {
					  	console.log(element);
					  	$(".product-pic-zoom img").attr("src", element.image);
					});
			  	}
			});


		});
		var size_id;
		$('input[name="size_id"]').change(function(e) { 

		    size_id =$(this).val(); 


		});

	})
</script>