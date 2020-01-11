@extends('layouts.app')
@section('slide')
@include('components.slide')
@endsection
@section('content')
<style>
	.rating .active {
		color: #ff9705;
	}
</style>
@if (!empty ($productSuggets))
<!-- product section start -->
<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>Sản Phẩm Bạn Thích?</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						@foreach ($productSuggets as $pro_phone)
						<!-- single-product start -->
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									@if ($pro_phone -> pro_number == 0)
									<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px; z-index: 100">Tạm Hết Hàng</span>
									@endif
									@if  ( $pro_phone -> pro_sale > 0 && $pro_phone -> pro_number > 0)
									<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white;z-index: 100">Giảm: {{$pro_phone -> pro_sale}}%</span>
									@endif
									
									<a href="{{ route('get.detail.product', [$pro_phone -> pro_slug, $pro_phone->id]) }}">
										<img class="primary-image" src="{{ asset(pare_url_file($pro_phone->pro_avatar)) }}" alt="" />
										<img class="secondary-image" src="{{ asset(pare_url_file($pro_phone->pro_avatar)) }}" alt="" />
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product', [$pro_phone -> pro_slug, $pro_phone->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart', $pro_phone->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>                                  
											</div>
											<div class="quickviewbtn">
												<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{number_format($pro_phone -> pro_price, 0, ',','.')}} VND</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="{{ route('get.detail.product',[$pro_phone-> pro_slug, $pro_phone -> id]) }}">{{$pro_phone -> pro_name}}</a></h2>
									<p>{{$pro_phone -> pro_description}}</p>
								</div>
							</div>
						</div>
						<!-- single-product end -->
						@endforeach

					</div>
				</div>  
			</div>
		</div>
		<!-- our-product area end -->   
	</div>
</div>
<!-- product section end -->
@endif

<!-- product section start -->
<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>Điện Thoại Nổi Bật</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						@foreach ($productPhone as $pro_phone)
						<!-- single-product start -->
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									@if ($pro_phone -> pro_number == 0)
									<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px; z-index: 100">Tạm Hết Hàng</span>
									@endif
									@if  ( $pro_phone -> pro_sale > 0 && $pro_phone -> pro_number > 0)
									<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white;z-index: 100">Giảm: {{$pro_phone -> pro_sale}}%</span>
									@endif
									
									<a href="{{ route('get.detail.product', [$pro_phone -> pro_slug, $pro_phone->id]) }}">
										<img class="primary-image" src="{{ asset(pare_url_file($pro_phone->pro_avatar)) }}" alt="" />
										<img class="secondary-image" src="{{ asset(pare_url_file($pro_phone->pro_avatar)) }}" alt="" />
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product', [$pro_phone -> pro_slug, $pro_phone->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart', $pro_phone->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>                                  
											</div>
											<div class="quickviewbtn">
												<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{number_format($pro_phone -> pro_price, 0, ',','.')}} VND</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="{{ route('get.detail.product',[$pro_phone-> pro_slug, $pro_phone -> id]) }}">{{$pro_phone -> pro_name}}</a></h2>
									<p>{{$pro_phone -> pro_description}}</p>
								</div>
							</div>
						</div>
						<!-- single-product end -->
						@endforeach

					</div>
				</div>  
			</div>
		</div>
		<!-- our-product area end -->   
	</div>
</div>
<!-- product section end -->

<!-- product section start -->
<div class="our-product-area new-productt" >
	<div class="container">
		<div class="area-title">
			<h2>LapTop Nổi Bật</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						@foreach ($productLaptop as $pro_laptop)
						<!-- single-product start -->
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									@if ($pro_laptop -> pro_number == 0)
									<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px; z-index: 100">Tạm Hết Hàng</span>
									@endif
									@if  ( $pro_laptop -> pro_sale > 0 && $pro_laptop -> pro_number > 0)
									<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white;z-index: 100">Giảm: {{$pro_laptop -> pro_sale}}%</span>
									@endif
									
									<a href="{{ route('get.detail.product', [$pro_laptop -> pro_slug, $pro_laptop->id]) }}">
										<img class="primary-image" src="{{ asset(pare_url_file($pro_laptop->pro_avatar)) }}" alt="" />
										<img class="secondary-image" src="{{ asset(pare_url_file($pro_laptop->pro_avatar)) }}" alt="" />
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="{{ route('get.detail.product', [$pro_laptop -> pro_slug, $pro_laptop->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="{{ route('add.shopping.cart', $pro_laptop->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>                                  
											</div>
											<div class="quickviewbtn">
												<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{number_format($pro_laptop -> pro_price, 0, ',','.')}} VND</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="{{ route('get.detail.product',[$pro_laptop-> pro_slug, $pro_laptop -> id]) }}">{{$pro_laptop -> pro_name}}</a></h2>
									<p>{{$pro_laptop -> pro_description}}</p>
								</div>
							</div>
						</div>
						<!-- single-product end -->
						@endforeach

					</div>
				</div>  
			</div>
		</div>
		<!-- our-product area end -->   
	</div>
</div>
<!-- product view section end -->

<!-- product section start -->
<div class="our-product-area new-product" id="view_product">
	
</div>
<!-- product view section end -->

<!-- block category area start -->
<div class="block-category">
	<div class="container">
		<div class="row">
			<!-- featured block start -->
			@if (isset($categoriHome))

			@foreach ($categoriHome as $c_home)
			<div class="col-md-4">
				<!-- block title start -->
				<div class="block-title">
					<h2>{{ $c_home -> c_name}}</h2>
				</div>
				<!-- block title end -->
				<!-- block carousel start -->
				@if (isset($c_home -> products))
				
				<div class="block-carousel">
					@foreach ($c_home -> products as $pro_item)
					<div class="block-content">
						<!-- single block start -->
						<div class="single-block">
							<div class="block-image pull-left">
								<a href="{{ route('get.detail.product', [$pro_item -> pro_slug, $pro_item->id]) }}"> <img src="{{pare_url_file($pro_item -> pro_avatar)}}" style="width: 170px; height: 208px;" alt="" /></a>
							</div>
							<div class="category-info">
								<h3><a href="{{ route('get.detail.product', [$pro_item -> pro_slug, $pro_item->id]) }}">{{ $pro_item -> pro_name}}</a></h3>
								<p>{{$pro_item -> pro_description}}</p>
								<div class="cat-price">{{number_format($pro_item -> pro_price, 0, ',', '.')}} VND</div>
								<div class="rating-price">	
									<?php
									$age = 0;
									if ($pro_item -> pro_total_rating) {
										$age = round($pro_item -> pro_total_number/ $pro_item -> pro_total_rating, 1);
									} 
									?>
									<div class="rating">
										@for ($i = 1; $i <= 5 ; $i++)
										<a href="#"><i class="fa fa-star {{ $i <= $age ? 'active' : ''}}"></i></a>
										@endfor
									</div>
								</div>							
							</div>
						</div>
					</div>
					@endforeach
				</div>
				

				@endif
				<!-- block carousel end -->
			</div>
			@endforeach
			@endif
			
			
			<!-- featured block end -->

		</div>
	</div>
</div>
<!-- block category area end -->

<!-- latestpost area start -->
@if (isset($articleNews))
<div class="latest-post-area">
	<div class="container">
		<div class="area-title">
			<h2>Tin Tức Mới</h2>
		</div>
		<div class="row">
			<div class="all-singlepost">
				<!-- single latestpost start -->
				@foreach ($articleNews as $artNews)
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="single-post">
						<div class="post-thumb">
							<a href="{{ route('get.detail.article',[$artNews -> a_slug, $artNews -> id]) }}">
								<img src="{{ asset(pare_url_file($artNews -> a_avatar)) }}" style="width: 370px; height: 280px" alt="" />
							</a>
						</div>
						<div class="post-thumb-info">
							<div class="post-time">
								<a href="{{ route('get.detail.article', [$artNews -> a_slug, $artNews -> id]) }}">{{$artNews -> a_name}}</a>
								<span>/</span>
								<span>Post by</span>
								<span>Admin</span>
							</div>
							<div class="postexcerpt">
								<p>{{$artNews -> a_description}}</p>
								<a href="{{ route('get.detail.article', [$artNews -> a_slug, $artNews -> id]) }}" class="read-more">Xem Thêm</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach

				<!-- single latestpost end -->

			</div>
		</div>
	</div>
</div>
@endif
<!-- latestpost area end -->

<!-- testimonial area start -->
<div class="testimonial-area lap-ruffel">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="crusial-carousel">
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>BootExperts</span>
					</div>
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>Lavoro Store!</span>
					</div>
					<div class="crusial-content">
						<p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
						<span>MR Selim Rana</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- testimonial area end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="brand-carousel">
				<div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
			</div>
		</div>
	</div>
</div>
<!-- Brand Logo Area End -->
@stop
@section('script')
<script>
	$(function(){
		let viewProduct = '{{ route('get.view.product') }}';
		checkViewProduct = false;
		$(document).on('scroll', function(){
			if ($(window).scrollTop() > 100 && checkViewProduct == false) {
				checkViewProduct = true;
				let products = localStorage.getItem('products');
				products = $.parseJSON(products);
				if (products.length > 0) {
					$.ajax({
						url: viewProduct,
						method: "GET",
						data: {
							id: products
						},
						success: function(result){
							$("#view_product").html('').append(result.data);
						}
					})
				}
			}
		});

	});

</script>
@stop