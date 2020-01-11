	@extends('layouts.app')
	@section('content')
	<div class="container wrapper">
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
								<li class="category3"><span>Giỏ Hàng </span>
									<i class="fa fa-angle-right"></i> Thanh Toán
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<div class="row cart-body">
			<form class="form-horizontal" method="POST" action="">
				@csrf()
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
					<!--REVIEW ORDER-->
					<div class="panel panel-info">
						<div class="panel-heading">
							Đơn Hàng Của Bạn <div class="pull-right"><small><a class="afix-1" href="{{ route('list.shopping.cart') }}">Cập Nhật</a></small></div>
						</div>
						<div class="panel-body">
							@foreach ($content as $cart_item)
							<div class="form-group">
								<div class="col-sm-3 col-xs-3">
									<img class="img-responsive" src="{{ asset(pare_url_file($cart_item -> options -> avatar)) }}" width="50px" height="50px" alt="" />
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="col-xs-12">{{$cart_item -> name}}</div>
									<div class="col-xs-12"><small>Số Lượng:<span>{{$cart_item -> qty}}</span></small></div>
								</div>
								<div class="col-sm-3 col-xs-3 text-right">
									<h6>{{number_format($cart_item -> price, 0, ',', '.')}} VND</h6>
								</div>
							</div>
							<div class="form-group"><hr /></div>
							@endforeach
							
							<div class="form-group">
								<div class="col-xs-12">
									<strong>Tổng Tiền</strong>
									<div class="pull-right"><span>{{Cart::subTotal(0, ',', '.')}}</span> VND</div>
								</div>
							</div>
							{{-- <div class="form-group">
								<div class="col-xs-12">
									<strong>Order Total</strong>
									<div class="pull-right"><span>$</span><span>150.00</span></div>
								</div>
							</div> --}}
						</div>
					</div>
					<!--REVIEW ORDER END-->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
					<!--SHIPPING METHOD-->
					<div class="panel panel-info">
						<div class="panel-heading">Thông Tin Thanh Toán</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="col-md-12">
									<h4>Thông Tin Của Bạn</h4>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Họ Tên:</strong></div>
								<div class="col-md-12">
									<input type="text" class="form-control" name="name" value="" required="" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Địa Chỉ:</strong></div>
								<div class="col-md-12">
									<input type="text" name="address" class="form-control" value=""  required="" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Số Điện Thoại:</strong></div>
								<div class="col-md-12"><input type="text" name="phone" class="form-control" value="{{get_data_user('web','phone')}}"  required="" /></div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Email Address:</strong></div>
								<div class="col-md-12"><input type="text" name="email" class="form-control" value="{{get_data_user('web','email')}}" required="" /></div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Ghi Chú:</strong></div>
								<div class="col-md-12"><textarea name="note" class="form-control" rows="4"></textarea></div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><input type="submit" class="btn btn-info" name="" value="Xác Nhận Thông Tin"></div>

							</div>
						</div>
					</div>
					<!--SHIPPING METHOD END-->
					<!--CREDIT CART PAYMENT-->
					{{-- <div class="panel panel-info">
						<div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="col-md-12"><strong>Card Type:</strong></div>
								<div class="col-md-12">
									<select id="CreditCardType" name="CreditCardType" class="form-control">
										<option value="5">Visa</option>
										<option value="6">MasterCard</option>
										<option value="7">American Express</option>
										<option value="8">Discover</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Credit Card Number:</strong></div>
								<div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
							</div>
							<div class="form-group">
								<div class="col-md-12"><strong>Card CVV:</strong></div>
								<div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<strong>Expiration Date</strong>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" name="">
										<option value="">Month</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" name="">
										<option value="">Year</option>
										<option value="2015">2015</option>
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<span>Pay secure using your credit card.</span>
								</div>
								<div class="col-md-12">
									<ul class="cards">
										<li class="visa hand">Visa</li>
										<li class="mastercard hand">MasterCard</li>
										<li class="amex hand">Amex</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
								</div>
							</div>
						</div>
					</div> --}}
					<!--CREDIT CART PAYMENT END-->
				</div>

			</form>
		</div>
	</div>
	@stop