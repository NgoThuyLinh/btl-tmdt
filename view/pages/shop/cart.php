<?php 
	include_once('view/layout/shop/header.php');
 ?>
<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Giỏ hàng của bạn</h4>
			<div class="site-pagination">
				<a href="">Trang chủ</a> /
				<a href="">Giỏ hàng</a>
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
						<h3>Giỏ hàng của bạn</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Sản phẩm</th>
									<th class="size-th">Kích thước</th>
									<th class="size-th">Màu</th>
									<th class="quy-th">Số lượng</th>
									<th class="total-th">Giá</th>
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
							<h6>Tổng tiền <span><?=$sum?> đ</span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" placeholder="Nhập mã khuyến mãi">
						<button>Gửi</button>
					</form>
					<a href="?mod=order&act=checkout" class="site-btn">Thanh toán</a>
					<a href="?mod=home&act=home" class="site-btn sb-dark">Tiếp tục mua hàng</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Sản phẩm bán chạy nhất</h2>
			</div>
			<div class="row">
				<?php if (isset($product_tops)) {
					foreach ($product_tops as $key => $value) {
				 ?>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<?php foreach ($imgs as $k) {
								if ($k->product_id==$value->id) {
							
							?>
							<img src="<?=$k->image?>" alt="">
							<?php break;} }?>
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>Thêm giỏ hàng</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<p><?=$value->name?></p>
						</div>
					</div>
				</div>
				<?php }} ?>
				
			</div>
		</div>
	</section>
	<!-- Related product section end -->

<?php 
	include_once('view/layout/shop/footer.php');
?>