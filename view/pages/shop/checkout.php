<?php 
	include_once('view/layout/shop/header.php');

 ?>

<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="POST" action="?mod=order&act=buy">
						<div class="cf-title">Thông tin</div>
						<div class="row">
							<label>
								<!-- <input type="text" hidden="" name="customer_id" value="<?=$_SESSION['user'][0]->customer_id?>" > -->
							</label>
								
						</div>
						<div class="row address-inputs">
							<div class="col-md-10">
								<input type="text" placeholder="Tên khách hàng" name="customer_name">
								<input type="email" placeholder="Email" name="customer_email">
								<input type="text" placeholder="Số điện thoại" name="customer_phone">
								<input type="text" placeholder="Ghi chú" name="description">
							</div>
							<div class="col-md-6">
								
								<select id="input1" class="form-control" required="required" name="city_id">
									<?php foreach ($data->city as $key => $value) {
										echo "<option value='".$value->id."'>".$value->name."</option>";
									} ?>
									
								</select>
								
								
								
							</div>
							<div class="col-md-6">
								<select id="huyen" class="form-control" required="required" name="district_id">
									<option value="">------------------------Chọn quận/huyện-------------------------</option>
								</select>	
									
							</div>
							<div class="col-md-6">
								<select id="xa" class="form-control" required="required" name="village_id">
									<option value="">----------------------------Chọn xã--------------------------</option>
								</select>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Số nhà" name="customer_address">
							</div>
							
						</div>
						<div class="cf-title">Thông tin giao hàng</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Tiêu chuẩn</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="delivery" id="ship-1" value="0">
										<label for="ship-1">Miễn phí</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Nhanh</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="delivery" id="ship-2" value="1">
										<label for="ship-2">30.000 đ</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Payment</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="public/img/paypal.png" alt=""></a></li>
							<li>Credit / Debit card<a href="#"><img src="public/img/mastercart.png" alt=""></a></li>
							<li>Pay when you get the package</li>
						</ul>
						<button class="site-btn submit-order-btn" name="submit">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						<ul class="product-list">
							<?php if (isset($_SESSION['cart'])) {
								$sum=0;
								
								foreach ($_SESSION['cart'] as $value) {
									$product_code = $value['product_code'];
							?>
							<li>
								<div class="pl-thumb"><img src="<?= $value['image'] ?>" alt=""></div>
								<h6><?= $orderdetails[$product_code]->name ?></h6>
								<p><?= $value['quantity_buy']?></p>
								<p><?= $orderdetails[$product_code]->price * $value['quantity_buy'] ?> đ</p>
							</li>
							<?php
									$sum+=$orderdetails[$product_code]->price * $value['quantity_buy'];
									}
								}
							?>
						</ul>
						<ul class="price-list">
							<li>Total<span><?=$sum?> đ</span></li>
							<li>Shipping<span>free</span></li>
							<li class="total">Total<span> <?=$sum?>đ</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

<?php 
	include_once('view/layout/shop/footer.php');
	if (isset($_GET['alert'])&& $_GET['alert']=='fail') {
		echo "<script type='text/javascript'>alert('Không thể mua hàng');</script>";
	}
?>
<script type="text/javascript">
	var selectValues = <?= json_encode($data->district) ?>;
	var selectValueVillage = <?= json_encode($data->village) ?>;
	// console.log(selectValueVillage);
</script>
<script  type="text/javascript" charset="utf-8" async defer>
	$(document).ready(function(){
		
		// console.log(selectValues)
		$('#input1').change(function(){
			var c=$(this).val();
			// console.log(c);
			 $('#huyen').children().remove();
			selectValues.forEach(function(s){
				if (s.city_id==c) 
			    	$('#huyen').append('<option value="' + s.id + '">' + s.name + '</option>');

			})
		});
		$('#huyen').change(function(){
			// console.log(this)
			var c=$(this).val();
			// console.log(c);
			 $('#xa').children().remove();
			selectValueVillage.forEach(function(s){
				console.log(s)
				if (s.district_id==c) 
			    	$('#xa').append('<option value="' + s.id + '">' + s.name + '</option>');

			})
		});
		

		});
</script>

<?php if (isset($_POST['submit'])) {
	$_POST['city_id']=1;
} ?>
