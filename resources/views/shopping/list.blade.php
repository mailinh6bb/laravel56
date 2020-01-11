	@extends('layouts.app')
	@section('content')
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
							<li class="category3"><span>Giỏ Hàng</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumbs area end -->
	<!-- Shopping Table Container -->
	<div class="cart-area-start">
		<div class="container">
			<!-- Shopping Cart Table -->
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="cart-table">
							<thead>
								<tr>
									<th>Stt</th>
									<th>Tên Sản Phẩm</th>
									<th>Hình Ảnh</th>
									<th>Giá</th>
									<th>Số Lương</th>
									<th>Xóa</th>
									<th>Thành Tiền</th>
									
								</tr>
							</thead>
							<tbody>
								@php
								$i=1;
								@endphp
								@foreach ($content as $cart_item)
								<tr>
									<td>
										{{$i}}
									</td>
									<td>
										<h6>{{$cart_item -> name}}</h6>
									</td>
									<td>
										<img src="{{ asset(pare_url_file($cart_item -> options -> avatar)) }}" width="50px" height="50px" alt="">
									</td>
									<td>
										<div class="cart-price">{{number_format($cart_item -> options -> price_old,0, ',', '.')}} VND</div>
										
										<div>
											Đã Giảm : {{$cart_item-> options -> sale}} %
										</div>
									</td>
									<td>
										<form>
											<input type="text" placeholder="{{$cart_item -> qty}}">
										</form>
									</td>
									<td><a href="{{ route('delete.shopping.cart', $cart_item -> rowId) }}"><i class="fa fa-times"></i></a></td>
									<td>
										<div class="cart-subtotal">{{number_format($cart_item -> price * $cart_item -> qty,0, ',', '.')}} VND</div>
									</td>
									
								</tr>
								@php
								$i++;
								@endphp
								@endforeach
								<tr>
									<td class="actions-crt" colspan="7">
										<div class="">
											<div class="col-md-6 col-sm-6 col-xs-6 align-left"><a class="cbtn" href="{{ route('home') }}">Tiếp Tục Mua Hàng</a></div>
											<div class="col-md-6 col-sm-6 col-xs-6 align-center"><a class="cbtn" href="#">Cập Nhật Giỏ Hàng</a></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Shopping Cart Table -->
			<!-- Shopping Coupon -->
			<div class="row">
				<div class="col-md-12 vendee-clue">
					
					<!-- Shopping Totals -->
					<div class="shipping coupon cart-totals">
						<ul>
							<li class="cartSubT">Tổng Tiền:    <span>{{$total}} VND </span> </li>
							
						</ul>
						<a class="proceedbtn" href="{{ route('get.form.pay') }}">Kiểm Tra và Thành Toán</a>
					</div>
					<!-- Shopping Totals -->
				</div>
			</div>
			<!-- Shopping Coupon -->
		</div>	
	</div>
	<!-- Shopping Table Container -->
	@stop