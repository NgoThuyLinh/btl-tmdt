<?php 
	include_once('view/layout/shop/header.php');
 ?>
	<!-- Product filter section -->
<section class="product-filter-section">
	<div class="container">
		<div class="section-title">
		<!-- <h2>BROWSE TOP SELLING PRODUCTS</h2> -->
		</div>
		<div class="row">
			<?php 
				foreach ($products as  $value) {
			?>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<?php 
								foreach ($imgs as $k) {
									if ($k->product_id== $value->id) {
										
									
							 ?>
								<img src="<?=$k->image?>" alt="" title="<?=$value->code?>" width = "270px" height = "270px">
							<?php break;}} ?>
						<div class="pi-links">
							<a href="?mod=product&act=productdetail&productCode=<?=$value->code?>" class="add-card"><i class="flaticon-bag"></i><span>Mua hàng</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$<?= $value->price ?></h6>
						<p><?= $value->name ?></p>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
		<div class="text-center pt-5">
			<button class="site-btn sb-line sb-dark">LOAD MORE</button>
		</div>
	</div>
</section>
	<!-- Product filter section end -->

<?php 
	include_once('view/layout/shop/footer.php');
 ?>