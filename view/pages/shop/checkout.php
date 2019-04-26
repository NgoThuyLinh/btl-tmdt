<?php 
	include_once('view/layout/shop/header.php');
	// var_dump($_SESSION['user']);
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
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<label>
								<input type="text" hidden="" name="customer_id" value="<?=$_SESSION['user'][0]->customer_id?>" >
							</label>
								
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Address" name="address_receive">
								
							</div>
							<div class="col-md-10">
								<input type="text" placeholder="Phone no." name="phone_receive">
							</div>
						</div>
						<div class="cf-title">Delievery Info</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Standard</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="delivery" id="ship-1" value="0">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Next day delievery  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="delivery" id="ship-2" value="1">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Payment</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="publics/img/paypal.png" alt=""></a></li>
							<li>Credit / Debit card<a href="#"><img src="publics/img/mastercart.png" alt=""></a></li>
							<li>Pay when you get the package</li>
						</ul>
						<button class="site-btn submit-order-btn">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						<ul class="product-list">
							<?php if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $value) {
									$product_code = $value['product_code'];
							?>
							<li>
								<div class="pl-thumb"><img src="http://192.168.43.210:8080/img/<?= $orderdetails[$product_code]->img ?>" alt=""></div>
								<h6><?= $orderdetails[$product_code]->name ?></h6>
								<p><?= $value['quantity_buy']?></p>
								<p><?= $orderdetails[$product_code]->price * $value['quantity_buy'] ?> đ</p>
							</li>
							<?php
									}
								}
							?>
						</ul>
						<ul class="price-list">
							<li>Total<span>300.000 đ</span></li>
							<li>Shipping<span>free</span></li>
							<li class="total">Total<span>300.000 đ</span></li>
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
