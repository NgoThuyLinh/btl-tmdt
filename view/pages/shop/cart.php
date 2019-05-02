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


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
									<th class="size-th">Size</th>
									<th class="size-th">Color</th>
									<th class="quy-th">Quantity</th>
									<th class="total-th">Price</th>
								</tr>
							</thead>
							<tbody>
									<?php 
										$sum=0;
									if (isset($_SESSION['cart'])) {
										foreach ($_SESSION['cart'] as $value) {
											$product_code = $value['product_code'];
									?>
								<tr>
									<td class="product-col">
										<img src="<?=$value['image']?>" alt="">
										<div class="pc-title">
											<h4><?= $orderdetails[$product_code]->name ?></h4>
										</div>
									</td>
									
									<td class="size-col"><h4><?= $orderdetails[$product_code]->size_name ?></h4></td>
									<td class="color-col"><h4 style="background: <?= $orderdetails[$product_code]->color_name ?>"></h4></td>
									<td class="quy-col">
										<div class="quantity">
					                        <!-- <div class="pro-qty"> -->
												<?= $value['quantity_buy']?>
											<!-- </div> -->
                    					</div>
									</td>
									<td class="total-col"><h4><?= $orderdetails[$product_code]->price * $value['quantity_buy'] ?> đ</h4></td>
								</tr>
									<?php
										$sum+=$orderdetails[$product_code]->price * $value['quantity_buy'];
											}
										}
									?>
								
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span><?=$sum?> đ</span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form>
					<a href="?mod=order&act=checkout" class="site-btn">Proceed to checkout</a>
					<a href="?mod=home&act=home" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Continue Shopping</h2>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-new">New</div>
							<img src="publics/img/product/2.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Black and White Stripes Dress</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="publics/img/product/5.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="publics/img/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="publics/img/product/1.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Related product section end -->

<?php 
	include_once('view/layout/shop/footer.php');
?>