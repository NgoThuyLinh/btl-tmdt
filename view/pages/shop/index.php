<?php 
	include_once('view/layout/shop/header.php');
 ?>

<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			
			<div class="product-slider owl-carousel">
				<?php if (isset($sliders)) {
					foreach ($sliders as $key => $value) {
						
				?>
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?=$value->image?>" alt="">
						
					</div>
					<div class="pi-text">
						<h5><?=$value->content?></h5>
					</div>
				</div>
				<?php }} ?>
				
			</div>
		</div>
	</section>
	<!-- letest product section end -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM MỚI</h2>
			</div>
			<ul class="product-filter-menu">
				<?php 
					if(isset($cats)){
						foreach ($cats as $key => $value) {	
							// echo $value->id;
							if($value->parent_id != NULL){
								// echo 'aaa';die();
				?>
				<li><a href="?mod=category&act=category&categoryId=<?= $value->id ?>"><?=$value->name?></a></li>
				<?php 
							}
						}
					} 
				?>
			</ul>
			<div class="row">
				<?php 
					if (isset($products)) {
						foreach ($products as $key => $value) {
						
				 ?>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<?php 
								foreach ($imgs as $k) {
									if ($k->product_id== $value->id) {
										
									
							 ?>
								<img src="<?=$k->image?>" alt="" title="<?=$k->code?>" width = "270px" height = "270px">
							<?php break;}} ?>
							<div class="pi-links">
								<a href="?mod=product&act=productdetail&productCode=<?=$value->code?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6><?=  number_format($value->price,0,".",",") . ' ₫' ?></h6>
							<p><?=$value->name?></p>
						</div>
					</div>
				</div>
				<?php 
						}
					}
				 ?>
				
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">Nhiều hơn</button>
			</div>
		</div>
	</section>


	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM BÁN CHẠY NHẤT</h2>
			</div>
			<div class="row">
				<?php 
					if (isset($product_tops)) {
						foreach ($product_tops as $key => $value) {
						
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
								<a href="?mod=product&act=productdetail&productCode=<?=$value->code?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6><?=  number_format($value->price,0,".",",") . ' ₫' ?></h6>
							<p><?=$value->name?></p>
						</div>
					</div>
				</div>
				<?php 
						}
					}
				 ?>
				
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">Nhiều hơn</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->

<?php 
	include_once('view/layout/shop/footer.php');
	if (isset($_GET['alert'])&& $_GET['alert']=='thanhcong') {
		echo "<script type='text/javascript'>alert('Bạn đã mua hàng thành công');</script>";
	}
 ?>