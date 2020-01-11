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
							<a href="index.html">Trang Chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>Liên Hệ</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- contact-details start -->
<div class="main-contact-area">
	<div class="container">
		<div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="contact-us-area">
					<!-- google-map-area start -->
					<div class="google-map-area">
						<!--  Map Section -->
						<div id="contacts" class="map-area">
							<div id="map" class="map" data-lat="43.6532" data-lng="-79.3832"></div>
						</div>

					</div>
					<!-- google-map-area end -->
					<!-- contact us form start -->
					<div class="contact-us-form">
						<div class="sec-heading-area">
							<h2>Liên Hệ Cho Chúng Tôi!</h2>
						</div>
						<div class="contact-form">
							<span class="legend">Thông Tin Liên Hệ</span>
							<form action="" method="post">
								@csrf
								<div class="form-top">
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<label>Họ Tên <sup>*</sup></label>
										<input type="text" name="c_name" class="form-control" required="">
									</div>
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<label>Email <sup>*</sup></label>
										<input type="email" name="c_email" class="form-control" required="">
									</div>
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<label>Số Điện Thoại <sup>*</sup></label>
										<input type="text" name="c_phone" class="form-control" required="">
									</div>	
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<label>Tiêu Đề <sup>*</sup></label>
										<input type="text" name="c_title" class="form-control" required="">
									</div>											
									<div class="form-group col-sm-12 col-md-12 col-lg-10">
										<label>Nội Dung<sup>*</sup></label>
										<textarea class="yourmessage" name="c_content" required=""></textarea>
									</div>	
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<input type="submit" class="btn btn-info" value ="Xác Nhận">	
									</div>							
								</div>
							</form>
						</div>
					</div>
					<!-- contact us form end -->
				</div>					
			</div>
		</div>
	</div>	
</div>
<!-- contact-details end -->
@stop