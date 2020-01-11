@extends('layouts.app')

@section('content')
<style>
	.sidebar-content .active {
		color: #c2a476;
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
						@if (isset($cateProduct['c_name']))
						<li class="category3"><span>{{$cateProduct['c_name']}}</span></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- shop-with-sidebar Start -->
<div class="shop-with-sidebar">
	<div class="container">
		<div class="row">
			<!-- left sidebar start -->
			<div class="col-md-3 col-sm-12 col-xs-12 text-left" style="padding-left: 0px; padding-right: 0px;">
				<div class="topbar-left">
					<aside class="widge-topbar">
						<div class="bar-title">
							<div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
							<h2>Bộ Lọc</h2>
						</div>
					</aside>
					<aside class="sidebar-content">
						<div class="sidebar-title">
							<h6>Khoảng Giá</h6>
						</div>
						<ul style="font-size: 10px;">
							<li><a class="{{Request::get('price') == 1 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '1'])}}">Dưới 1.000.000 đ</a></li>
							<li><a class="{{Request::get('price') == 2 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '2'])}}">Từ 1.000.0000 - 3.000.000 đ</a></li>
							<li><a class="{{Request::get('price') == 3 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '3'])}}">Từ 3.000.0000 - 5.000.000 đ</a></li>
							<li><a class="{{Request::get('price') == 4 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '4'])}}">Từ 5.000.0000 - 7.000.000 đ</a></li>
							<li><a class="{{Request::get('price') == 5 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '5'])}}">Từ 7.000.0000 - 10.000.000 đ</a></li>	
							<li><a class="{{Request::get('price') == 6 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '6'])}}">Trên 10.000.0000 đ</a></li>

						</ul>
					</aside>		
					<aside class="widge-topbar">
						<div class="bar-title">
							<div class="bar-ping"><img src="{{ asset('img/bar-ping.png') }}" alt=""></div>
							<h2>Tags</h2>
						</div>
						<div class="exp-tags">
							<div class="tags">
								<a  href="?proname=iphone">Iphone</a>
								<a href="?proname=samsung">SamSung</a>
								<a href="?proname=oppo">Oppo</a>
								<a href="?proname=nokia">Nokia</a>
								<a href="?proname=priced">Giá Rẻ</a>
								<a href="?proname=numberhot">Bán Chạy</a>
								<a href="?proname=latest">Mới Nhất</a>
								<a href="?proname=laptop">laptop</a>
							</div>
						</div>
					</aside>
				</div>
			</div>
			<!-- left sidebar end -->
			<!-- right sidebar start -->
			<div class="col-md-9 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left:0px;">
				<!-- shop toolbar start -->
				<div class="shop-content-area">
					<div class="shop-toolbar">
						<div class="col-xs-12 nopadding-left text-left">
							<form class="tree-most" id="form-order" method="get">
								<div class="orderby-wrapper pull-right">
									<label>Sắp Xếp</label>
									<select name="orderby" class="orderby">
										<option {{Request::get('orderby') == 'md' ? 'selected' : ''}} value="md" selected="selected">Mặc Định</option>
										<option {{Request::get('orderby') == 'popu' ? 'selected' : ''}} value="popu">Bán Chạy</option>
										<option {{Request::get('orderby') == 'rating' ? 'selected' : ''}} value="rating">Lượt Đánh Giá</option>
										<option {{Request::get('orderby') == 'date' ? 'selected' : ''}} value="date">Mới Nhất</option>
										<option {{Request::get('orderby') == 'asc' ? 'selected' : ''}} value="asc">Giá Tăng Dần</option>
										<option {{Request::get('orderby') == 'desc' ? 'selected' : ''}} value="desc">Giá Giảm Dần</option>
									</select>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- shop toolbar end -->

				<!-- product-row start -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="shop-grid-tab">
						<div class="row">
							<div class="shop-product-tab first-sale">
								@foreach ($product as $pro_item)								
								<div class="col-lg-4 col-md-4 col-sm-4">
									<div class="two-product">
										<!-- single-product start -->
										<div class="single-product">
											@if ($pro_item -> pro_number == 0)
											<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px;z-index: 100">Tạm Hết Hàng</span>
											@endif
											@if  ( $pro_item -> pro_sale > 0 && $pro_item -> pro_number > 0)
											<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white; z-index: 100">Giảm: {{$pro_item -> pro_sale}}%</span>
											@endif
											<div class="product-img">
												<a href="{{ route('get.detail.product', [$pro_item -> pro_slug, $pro_item->id]) }}">
													<img class="primary-image" src="{{ asset(pare_url_file($pro_item -> pro_avatar)) }}" alt="" />
													<img class="secondary-image" src="{{ asset(pare_url_file($pro_item -> pro_avatar)) }}" alt="" />
												</a>
												<div class="action-zoom">
													<div class="add-to-cart">
														<a href="{{ route('get.detail.product', [$pro_item -> pro_slug, $pro_item->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
													</div>
												</div>
												<div class="actions">
													<div class="action-buttons">
														<div class="add-to-links">
															<div class="add-to-wishlist">
																<a href="{{ route('get.detail.product', [$pro_item -> pro_slug, $pro_item->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
															</div>
															<div class="compare-button">
																<a  href="{{ route('add.shopping.cart', $pro_item->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
															</div>									
														</div>
														<div class="quickviewbtn">
															<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
														</div>
													</div>
												</div>
												<div class="price-box">
													<span class="new-price">{{number_format($pro_item -> pro_price, 0, ',', '.')}} VND</span>
												</div>
											</div>
											<div class="product-content">
												<h2 class="product-name"><a href="{{ route('get.detail.product', [$pro_item -> pro_slug, $pro_item->id]) }}">{{$pro_item -> pro_name}}</a></h2>
												<p>{{$pro_item -> pro_description}}</p>
											</div>
										</div>
										<!-- single-product end -->
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<!-- product-row end -->
					</div>

					<!-- shop toolbar start -->
					<div class="shop-content-bottom">
						<div class="shop-toolbar btn-tlbr">
							<div class="col-md-4 col-sm-4 col-xs-12 text-center">
								<div class="pages">
									{{$product ->appends($query)->links()}}
								</div>
							</div>
						</div>
					</div>
					<!-- shop toolbar end -->
				</div>
			</div>
			<!-- right sidebar end -->
		</div>
	</div>
</div>
<!-- shop-with-sidebar end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="brand-carousel">
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg1-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg2-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg3-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg4-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg5-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg2-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg3-brand.jpg') }}" alt="" /></a></div>
				<div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg4-brand.jpg') }}" alt="" /></a></div>
			</div>
		</div>
	</div>
</div>
<!-- Brand Logo Area End -->
@stop
@section('script')
<script>
	$(function(){
		$(".orderby").change(function(){
			$("#form-order").submit()
		});
	});

</script>
@stop