@extends('layouts.app')

@section('content')
<style>
	.list_star i:hover{
		cursor: pointer;
	}
	.list_text {
		display: inline-block;
		margin-left: 10px;
		position: relative;
		background: #52b858;
		color: #fff;
		padding: 2px 8px;
		box-sizing: border-box;
		font-size: 12px;
		border-radius: 2px;
		display: none;
	}
	.rating .active {
		color: #ff9705;
	}
	.list_star .rating_active {
		color: #ff9705;
	}
	.list_text::after {
		right: 100%;
		top: 50%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(82,184,88,0);
		border-right-color: #52b858;
		border-width: 6px;
		margin-top: -6px;
	}
</style>
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container-inner">
					<ul>
						<li class="home">
							<a href="{{ route('home') }}">Trang Chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>{{$cateProduct -> c_name}} \ {{$productDetail -> pro_name}}</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- product-details Area Start -->
<div class="product-details-area" id="content_product" data-id="{{ $productDetail -> id}}">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12">
				<div class="zoomWrapper">
					<div id="img-1" class="zoomWrapper single-zoom">
						<a href="#">
							<img id="zoom1" src="{{ asset(pare_url_file($productDetail ->pro_avatar)) }}" data-zoom-image="img/product-details/ex-big-1-1.jpg" alt="big-1">
						</a>
					</div>
					{{-- <div class="single-zoom-thumb">
						<ul class="bxslider" id="gallery_01">
							<li>
								<a href="#" class="elevatezoom-gallery active" data-update="" data-image="img/product-details/big-1-1.jpg" data-zoom-image="img/product-details/ex-big-1-1.jpg"><img src="img/product-details/th-1-1.jpg" alt="zo-th-1" /></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-1-2.jpg" data-zoom-image="img/product-details/ex-big-1-2.jpg"><img src="img/product-details/th-1-2.jpg" alt="zo-th-2"></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-1-3.jpg" data-zoom-image="img/product-details/ex-big-1-3.jpg"><img src="img/product-details/th-1-3.jpg" alt="ex-big-3" /></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-4.jpg" data-zoom-image="img/product-details/ex-big-4.jpg"><img src="img/product-details/th-4.jpg" alt="zo-th-4"></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-5.jpg" data-zoom-image="img/product-details/ex-big-5.jpg"><img src="img/product-details/th-5.jpg" alt="zo-th-5" /></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-6.jpg" data-zoom-image="img/product-details/ex-big-6.jpg"><img src="img/product-details/th-6.jpg" alt="ex-big-3" /></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-7.jpg" data-zoom-image="img/product-details/ex-big-7.jpg"><img src="img/product-details/th-7.jpg" alt="ex-big-3" /></a>
							</li>
							<li class="">
								<a href="#" class="elevatezoom-gallery" data-image="img/product-details/big-8.jpg" data-zoom-image="img/product-details/ex-big-8.jpg"><img src="img/product-details/th-8.jpg" alt="ex-big-3" /></a>
							</li>
						</ul>
					</div> --}}
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<div class="product-list-wrapper">
					<div class="single-product">
						<div class="product-content">
							<h1 class="product-name"><a href="#">{{$productDetail -> pro_name}}</a></h1>
							<div class="rating-price">	
								<?php
								$age = 0;
								if ($productDetail -> pro_total_rating) {
									$age = round($productDetail -> pro_total_number/ $productDetail -> pro_total_rating, 1);
								} 
								?>
								<div class="rating">
									@for ($i = 1; $i <= 5 ; $i++)
									<a href="#"><i class="fa fa-star {{ $i <= $age ? 'active' : ''}}"></i></a>
									@endfor
								</div>
								<div class="price-boxes">
									<span class="new-price">{{number_format($productDetail -> pro_price, 0, ',', '.')}} VND</span>
								</div>
							</div>
							<div class="product-desc">
								<p>{!!$productDetail -> pro_description!!}</p>
							</div>
							<p class="availability in-stock">Availability: <span>In stock</span></p>
							<div class="actions-e">
								<div class="action-buttons-single">
									<div class="inputx-content">
										<label for="qty">Số Lượng:</label>
										<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
									</div>
									<div class="add-to-cart">
										<a href="#">Add to cart</a>
									</div>
									<div class="add-to-links">
										<div class="add-to-wishlist">
											<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
										</div>
										<div class="compare-button">
											<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
										</div>									
									</div>
								</div>
							</div>
							<div class="singl-share">
								<a href="#"><img src="img/single-share.png" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="single-product-tab">
				<!-- Nav tabs -->
				<ul class="details-tab">
					<li class="active"><a href="#home" data-toggle="tab">Mô tả</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="product-tab-content">
							{!! $productDetail -> pro_content!!}
						</div>
					</div>

					{{-- Tab Đánh Giá --}}

					<div class="component_rating" style="margin-bottom: 20px; ">
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Đánh Giá Sản Phẩm</a></li>
						</ul>
						<div class="component_rating_content" style="display: flex; align-items: center; border: 1px solid #dedede; border-radius: 5px;">
							<div class="rating_item" style="width: 20%; position: relative;">
								<div class="">
									<span class="fa fa-star" style="font-size: 100px; color: #ff9705; display: block; margin: 0 auto; text-align: center;"></span>
									<b style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); color: white; font-size: 20px;">{{$age}}</b>
								</div>
							</div>
							<div class="list_rating" style="width: 60%; padding: 20px;">

								@foreach ($arrayRating as $key =>  $ar_item)
								<?php 
								$itemAge = round(($ar_item['total']/$productDetail->pro_total_rating)*100, 0);
								?>
								<div class="item_rating" style="display: flex; align-items: center;">
									<div style="width: 10%;">
										{{$key}} <span class="fa fa-star"></span>
									</div>
									<div style="width: 70%; margin: 0 20px;">
										<span style="width: 100%; height: 8px; display: block; border-radius: 5px; background: #dedede"><b style="width: {{$itemAge}}%; background: #f25800; display: block; height: 100%; border-radius: 5px;"></b></span>
									</div>
									<div style="width: 20%;">
										<a href="">{{$ar_item['total']}} đánh giá</a>
									</div>
								</div>
								@endforeach
							</div>	
							<div style="width: 20%; " >
								<a href="" class="js_rating_action" style="width: 200px; background: #288ad6; padding: 10px; color: white; border-radius: 10px;">Gửi Đánh Giá Của Bạn</a>
							</div>
						</div>
						<div class="form_rating hide">
							<div style="display: flex; margin-top: 15px; font-size: 15px;" >
								<p style="	margin-bottom: 0px;">Chọn Đánh Giá Cho Sản Phẩm</p>
								<span class="list_star" style="margin: 0 15px;">
									@for ($i = 1; $i <= 5 ; $i++)
									<i class="fa fa-star" data-key={{ $i}}></i>
									@endfor
								</span>
								<span class="list_text"></span>
								<input type="hidden" name="" value="" class="number_rating" placeholder="">
							</div>
							<div style=" margin-top: 15px;">
								<textarea name="rating" id="ra_content" class="form-control" rows="5" placeholder="Vui lòng nhập đánh giá của bạn!"></textarea>
							</div>
							<div style=" margin-top: 15px; ">
								<a href="{{ route('post.rating.product', $productDetail-> id) }}" class="js_rating_product" style=" width: 200px;background: #288ad6; padding: 6px; color: white; border-radius: 8px;">Gởi Đánh Giá</a>
							</div>
						</div>
					</div>

					{{-- End Đánh Giá --}}
					<div class="component_list_rating">
						@if (isset($rating))
						@foreach ($rating as $r_item)
						<div class="rating_list_item" style="margin: 10px;">
							<div>
								<span style="color: #333; font-weight: bold; text-transform: capitalize">{{ $r_item -> user -> name}}</span>
								<a style="color: #2ba832;"> <i class="fa fa-check-circle-o"></i> Đã mua hàng tai website.</a>
							</div>
							<p style="margin-bottom: 0">
								<span>
									@for ($i = 1; $i <=5 ; $i++)
									<i class="fa fa-star"></i>
									@endfor
								</span>
								{{ $r_item -> ra_content}}
							</p>
							<div>
								<span class="fa fa-clock-o"> 
									@php
									echo \Carbon\Carbon::createFromTimeStamp(strtotime($r_item->created_at))->diffForHumans();
									@endphp
								</span>
							</div>
						</div>
						@endforeach	
						@endif
					</div>
				</div>
			</div>					
		</div>
	</div>
</div>
</div>
<!-- product-details Area end -->
<!-- product section start -->
<div class="our-product-area new-product">
	<div class="container">
		<div class="area-title">
			<h2>Sản Phẩm Liên Quan</h2>
		</div>
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="features-curosel">
						@foreach ($productSame as $proSame)
						<!-- single-product start -->
						<div class="col-lg-12 col-md-12">
							<div class="single-product first-sale">
								<div class="product-img">
									<a href="{{ route('get.detail.product', [$proSame -> pro_slug, $proSame->id]) }}">
										<img class="primary-image" src="{{ asset(pare_url_file($proSame -> pro_avatar)) }}" alt="" />
										<img class="secondary-image" src="{{ asset(pare_url_file($proSame -> pro_avatar)) }}" alt="" />
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>									
											</div>
											<div class="quickviewbtn">
												<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
									<div class="price-box">
										<span class="new-price">{{number_format($proSame -> pro_price, 0, ',', '.')}} VND</span>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{$proSame -> pro_name}}</a></h2>
									<p>{{$proSame -> pro_description}}</p>
								</div>
							</div>
						</div>
						@endforeach
						<!-- single-product end -->
					</div>
				</div>	
			</div>
		</div>
		<!-- our-product area end -->	
	</div>
</div>
<!-- product section end -->
@stop
@section('script')
<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$(function(){
		let listStar = $(".list_star .fa");
		listRatingText = {
			'1' : 'Không Thích',
			'2' : 'Tạm Được',
			'3' : 'Bình Thường',
			'4' : 'Tốt',
			'5' : 'Rất Tốt',
		}

		listStar.mouseover(function(){
			let $this = $(this);
			let number = $this.attr('data-key');
			listStar.removeClass('rating_active');
			$(".number_rating").val(number);
			$.each(listStar, function(key, value){
				if (key + 1 <= number) {
					$(this).addClass('rating_active');
				}
			});
			$(".list_text").text('').text(listRatingText[number]).show();		
		});
		$(".js_rating_action").click(function(event){
			event.preventDefault();
			if ($(".form_rating").hasClass('hide')) {
				$(".form_rating").addClass('active').removeClass('hide');
			}
			else {
				$(".form_rating").addClass('hide').removeClass('active');
			}

		})
		$(".js_rating_product").click(function(event){
			event.preventDefault();

			let content = $("#ra_content").val();
			let number = $(".number_rating").val();
			let url = $(this).attr('href');
			if (content && number) {
				$.ajax({
					url: url,
					type: 'POST',
					data:{
						number : number,
						r_content : content
					}
				}).done(function(result) {
					if (result.code == 1) {
						alert("Gởi đánh giá thành công!");
						location.reload();
					}
				});
			}
			
		})
		// lấy giá trị storage
		// // lưu id sản phẩm vo storage
		let idProduct = $("#content_product").attr('data-id');
		let products = localStorage.getItem('products');

		if (products == null) {
			arrayProduct = new Array();
			arrayProduct.push(idProduct)
			localStorage.setItem('products', JSON.stringify(arrayProduct))
		}
		else {
			// lấy giá trị mảng id đã lưu và chuyển về mảng
			products = $.parseJSON(products)
			if (products.indexOf(idProduct) == -1) {
				products.push(idProduct);
				localStorage.setItem('products', JSON.stringify(products));
			}
		}
	});
</script>
@stop