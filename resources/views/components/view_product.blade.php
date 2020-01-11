<!-- product section start -->
<div class="container">
	<div class="area-title">
		<h2>Sản Phẩm Vừa Xem</h2>
	</div>
	<!-- our-product area start -->
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="features-curosel">
					@foreach ($productView as $pro_view)
					<!-- single-product start -->
					<div class="col-lg-2 col-md-2">
						<div class="single-product first-sale">
							<div class="product-img">
								@if ($pro_view -> pro_number == 0)
								<span style="position: absolute; background: #e91e63; color: white; border-radius: 4px; font-size: 10px; padding: 5px 10px; z-index: 100">Tạm Hết Hàng</span>
								@endif
								@if  ( $pro_view -> pro_sale > 0 && $pro_view -> pro_number > 0)
								<span class="sale_item" style="position: absolute; font-size: 11px; background-image: linear-gradient(-250deg,#ec1f1f 0%,#ff9c00 100%); border-radius: 10px; padding: 5px 10px; color: white;z-index: 100">Giảm: {{$pro_view -> pro_sale}}%</span>
								@endif

								<a href="{{ route('get.detail.product', [$pro_view -> pro_slug, $pro_view->id]) }}">
									<img class="primary-image" src="{{ asset(pare_url_file($pro_view->pro_avatar)) }}" alt="" />
									<img class="secondary-image" src="{{ asset(pare_url_file($pro_view->pro_avatar)) }}" alt="" />
								</a>
								<div class="action-zoom">
									<div class="add-to-cart">
										<a href="{{ route('get.detail.product', [$pro_view -> pro_slug, $pro_view->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
									</div>
								</div>
								<div class="actions">
									<div class="action-buttons">
										<div class="add-to-links">
											<div class="add-to-wishlist">
												<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
											</div>
											<div class="compare-button">
												<a href="{{ route('add.shopping.cart', $pro_view->id) }}" title="Add to Cart"><i class="icon-bag"></i></a>
											</div>                                  
										</div>
										<div class="quickviewbtn">
											<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
										</div>
									</div>
								</div>
								<div class="price-box">
									<span class="new-price">{{number_format($pro_view -> pro_price, 0, ',','.')}} VND</span>
								</div>
							</div>
							<div class="product-content">
								<h2 class="product-name"><a href="{{ route('get.detail.product',[$pro_view-> pro_slug, $pro_view -> id]) }}">{{$pro_view -> pro_name}}</a></h2>
								<p>{{$pro_view -> pro_description}}</p>
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
<!-- product section end -->