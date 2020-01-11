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
						<li class="category3"><span>Quản Lý Đơn Hàng</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->

<div class="container">
	<div class="row placeholders" style=" margin: 20px;">
		<div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail" style="border-radius: 50%;">
			<span class="text-muted"  style="position: absolute; top: 50%; left: 40%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0">
				@if ($totalTransaction > 0)
				{{$totalTransaction}}
				@else
				0
				@endif
			Đơn Hàng</span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail" style="border-radius: 50%;">

			<span class="text-muted" style="position: absolute; top: 50%; left: 40%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0;">
				@if ($totalTransactionDone > 0)
				{{$totalTransactionDone}}
				@else
				0
				@endif

			Đơn Hàng Đã Xử Lý</span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail" style="border-radius: 50%;" >

			<span class="text-muted" style="position: absolute; top: 50%; left: 40%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0;"> 
				@if ($totalTransaction)
				{{$totalTransaction - $totalTransactionDone}}
				@endif	
			Đơn Hàng Chờ Xử Lý</span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail" style="border-radius: 50%;">

			<span class="text-muted" style="position: absolute; top: 50%; left: 40%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0">Đơn Hàng Đã Hủy</span>
		</div>
	</div>

	<div class="row" >
		<h2 class="sub-header"> <a href="">Danh Sách Đơn Hàng Của <i>{{get_data_user('web', 'name')}}</i></a></h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Địa Chỉ</th>
						<th>Nội Dung</th>
						<th>Tổng Tiền</th>
						<th>Trạng Thái</th>
						<th>Thời Gian</th>
					</tr>
				</thead>

				<tbody>
					@if ($transactions)
					@foreach ($transactions as $key => $tr_item)
					<tr>
						<td>{{$tr_item -> id}}</td>
						<td>{{$tr_item -> tr_address}}</td>
						<td>{{$tr_item -> tr_phone}}</td>
						<td>
							@php
					// hiển thị tiếng việt
							\Carbon\Carbon::setLocale('vi'); 
							echo \Carbon\Carbon::createFromTimeStamp(strtotime($tr_item->created_at))->diffForHumans();
							@endphp
						</td>
						<td>
							{{ number_format($tr_item -> tr_total, 0, ',', '.')}} VND
						</td>
						<td>
							@if ($tr_item ->tr_status == 1)
							<a  class="label label-success">Đã Xử Lý</a>
							@else
							<a  class="label label-default">Chờ Xử Lý</a>
							@endif
						</td>
					</tr>

					@endforeach	
					@else
					<tr>
						<td colspan="6" rowspan="" headers="">
							<p>Bạn Chưa có đơn hàng nào.</p>
						</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection