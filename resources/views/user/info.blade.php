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
						<li class="category3"><span>Quản Lý Tài Khoản</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin tài khoản</div>
				<div class="panel-body">
					{{-- hiện thị lỗi sửa --}}
					@if (count($errors) > 0)
					<div class="row alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="" method="POST">
						{!!csrf_field()!!}
						<div class="form-group">
							<label>Họ tên</label>
							<input type="text" class="form-control"  name="name" aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" disabled="" placeholder="Email" name="email" value="{{Auth::user()->email}}" 
							>
						</div>
						
						<div>
							<label>Đổi mật khẩu</label>
							<input type="checkbox" name="changePass" id="changePass">
						</div>
						<div class="form-group" style="position: relative;">
							<label>Nhập mật khẩu</label>
							<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled="">
							<a style="position: absolute; top: 50%; right: 10px; color: #333" href="javascript:;void(0)" title="" class="active"><i class="fa fa-eye"></i></a>
						</div>
						<div class="form-group"style="position: relative;">
							<label>Nhập lại mật khẩu</label>
							<input type="password" class="form-control password" name="rePassword" aria-describedby="basic-addon1" disabled="">
							<a style="position: absolute; top: 50%; right: 10px; color: #333" href="javascript:;void(0)" title="" class="active"><i class="fa fa-eye"></i></a>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" class="form-control" placeholder="Phone" name="phone" value="{{Auth::user()->phone}}" 
							>
						</div>
						<div class="form-group">
							<label>Địa Chỉ</label>
							<input type="text" class="form-control" required="" placeholder="Vui lòng nhập địa chỉ." name="address" value="{{Auth::user()->address}}" 
							>
						</div>
						<div class="form-group">
							<label>Thông Tin Về Bạn</label>
							<textarea class="form-control" rows="4" required="" placeholder="Vui lòng nhập thông tin của bạn" name="info">{{Auth::user()->info}}</textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-info" value="Cập Nhật"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	
	$(document).ready(function(){
		$("#changePass").change(function(){

			if($(this).is(":checked")){
				$(".password").removeAttr('disabled');
			}
			else {
				$(".password").attr('disabled', '');
			}
		})
	})
	$(function(){
		$(".form-group a").click(function(){
			let $this = $(this);
			if ($this.hasClass('active')) {
				$this.parents('.form-group').find('input').attr('type','password');
				$this.removeClass('active');	
			}
			else {
				$this.parents('.form-group').find('input').attr('type','text');
				$this.addClass('active');
			}
		});
	});
</script>
@endsection