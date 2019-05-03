<?php 
	include_once('view/layout/shop/header.php');
 ?>

<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category Page</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							<?php 
								if(isset($categories)){
									foreach ($categories as $key => $value) {
							?>
								<li><a href="?mod=category&categoryId<?=$value->id?>"><?=($value->name)?></a></li>
							<?php
									}
								}
							?>
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<input type="hidden" id= "category" name="category" value= "<?=  $category_id ?>">
						<div class="price-range-wrap">
							<h4>Price</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10000" data-max="10000000">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input" >
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">color by</h2>
						<div class="fw-color-choose">
							<?php 
								if (isset($colors)) {
									foreach ($colors as $key => $value) {									
							 ?>
							<div class="cs-item">
								<input type="radio" name="cs" id="<?=$value->name?>-color" value = "<?=$value->id?>">
								<label class="cs-<?=$value->name?>" for="<?=$value->name?>-color">
								</label>
							</div>
							<?php 
									}
								} 
							?>
							
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Size</h2>
						<div class="fw-size-choose">
							<?php 
								if (isset($sizes)) {
									foreach ($sizes as $key => $value) {									
							 ?>
							<div class="sc-item">
								<input type="radio" name="sc" id="<?=$value->name?>-size" value="<?=$value->id?>">
								<label for="<?=$value->name?>-size"><?=$value->name?></label>
							</div>
							<?php 
									}
								} 
							?>
							
						</div>
					</div>
					<div class="filter-widget">
						<button class="fw-title" id ="buttonSearchCate">Brand</button>
						<ul class="category-menu">
							<?php if (isset($producers)) {
								foreach ($producers as $key => $value) {
							?>
							<li><a href="#"><?= $value->name?></a></li>
							<?php
								}
							} 
							?>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row" id="cate_pro">
						<?php 
							if (isset($products)) {
								// var_dump($products);die();
								foreach ($products as $key => $value) {										
						 ?>
						<div class="col-lg-4 col-sm-6">

							<div class="product-item">
								<div class="pi-pic">
									<div class="tag-sale">ON SALE</div>
									<img src="http://192.168.43.210:8080/img/<?= $value->img?>" alt="" width = "100%" height = "200px" >
									<div class="pi-links">
										<a href="?mod=product&act=productdetail&productCode=<?=$value->product_code?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6><?=  number_format($value->price,0,".",",") . ' ₫' ?></h6>
									<p><?=$value->name ?></p>
								</div>
							</div>
						</div>
						<?php 
								}
							}
						 ?>
						
						<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">LOAD MORE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->


<?php 
	include_once('view/layout/shop/footer.php');
?> 
<script type="text/javascript">
	$(document).ready(function(){
		 $(document).on('click', '#buttonSearchCate', function() {
		 	data = {
		 		category: $('#category').val(),
                minamount: $('#minamount').val(),
                maxamount: $('#maxamount').val(),
                color: $("input[name='cs']:checked").val(),
                size: $("input[name='sc']:checked").val()
	        },
		    searchproduct(data);

		    });
	})

	function searchproduct(data){
		$('#cate_pro').children().remove();
		// console.log(typeof(data))
		var  myJsonString= JSON.stringify(data);
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		$.ajax({
			processData: false,
			contentType: false,
			url: '?mod=category&act=searchProduct',
			type: 'GET',
			data: "ketqua="+myJsonString,
			// dataType : 'json',

			success : function(data){
	            var array = JSON.parse(data);
				// console.log(array);
	            $.each(array, function(key,value){
					console.log(value.name);
	                $('#cate_pro').append('<div class="col-lg-4 col-sm-6"><div class="product-item"><div class="pi-pic"><div class="tag-sale">ON SALE</div><img src="http://192.168.43.210:8080/img/'+ value.name+'" alt="" width = "100%" height = "200px" ><div class="pi-links"><a href="?mod=product&act=productdetail&productCode='+value.product_code+'" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a><a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a></div></div><div class="pi-text"><h6>'+  value.price+'</h6><p>'+value.name +'</p></div></div></div>');
	            })
			},
		});
	}
</script>