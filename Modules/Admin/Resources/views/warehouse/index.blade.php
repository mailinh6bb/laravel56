@extends('admin::layouts.master')
@section('title','Sản Phẩm')
@section('content')
<style>
	.rating .active {
		color: #ff9705;
	}
	.product_warehouse  {
		border-bottom: 2px solid #dedede;
		margin: 20px 0px;
	}
	.product_warehouse a {
		text-decoration: none;
		font-size: 20px;
		padding-left: 5px;
		background-color: #428BCA;	
		color:white;
		padding: 5px 10px;
		border-radius: 8px;
		margin-left: 10px;
	}
	.product_warehouse .active {
		background-color:#144685;	
		color: black;
	} 
</style>
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="{{ route('admin.get.list.product') }}">Sản Phẩm</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
{{-- Tìm Kiếm Sản Phẩm --}}
<div class="row">
	<div class="col-sm-12">
		<form class="form-inline" action="" >
			<div class="form-group">
				<input type="text" class="form-control" name="name" value="{{\Request::get('name')}}" placeholder="Tìm Kiếm">
				<select name="cate_id" class="form-control">
					<option value="">Danh Mục</option>
					@if (isset($category))
					@foreach ($category as $c_item)
					<option value="{{$c_item -> id}}" {{\Request::get('cate_id') == $c_item -> id ? "selected" : null}}>{{$c_item ->c_name}}</option>
					@endforeach
					@endif	
				</select>
			</div>
			<button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
		</form>
	</div>

</div>
<div class="table-responsive">
	<div class="product_warehouse">
		<h2> <i>Quản Lý Kho Hàng</i>
			<a href="?type=selling" class="{{ Request::get('type') == "selling" ? "active" : ""}}" title="">Bán Chạy</a>
			<a href="?type=inventory" class="{{ Request::get('type') == "inventory" ? "active" : ""}}"  title="">Tồn Kho</a>
			<a href="?type=over"  class="{{ Request::get('type') == "over" ? "active" : ""}}"  title="">Hết Hàng</a>
		</h2>
	</div>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Sản Phẩm</th>
				<th>Hình Ảnh</th>
				<th>Giá</th>
				<th>Danh Mục</th>
				<th>Số Lương</th>
				<th>Đã Bán</th>
				<th>Còn Lại</th>
			</tr>
		</thead>
		<tbody>
			@if ($product)
			@foreach ($product as $pro_item)
			<tr>
				<td>{{$pro_item -> id}}</td>
				<td><ul>
					<li>{{$pro_item -> pro_name}}</li>
					<li>
						<?php
						$age = 0;
						if ($pro_item -> pro_total_rating) {
							$age = round($pro_item -> pro_total_number/ $pro_item -> pro_total_rating, 2);
						} 
						?>
						<span>Đánh Giá:</span>
						<span class="rating">
							@for ($i = 1; $i <=5 ; $i++)
							<i class="fa fa-star {{$i <= $age ? 'active' : '' }}"></i>
							@endfor
						</span>
						<span>{{ $age}}</span>
					</li>
				</ul>

			</td>
			<td>
				<img src="{{pare_url_file($pro_item -> pro_avatar)}}" width="100px" height="100px" alt="">
			</td>
			<td>
				<ul>
					<li>{{number_format($pro_item -> pro_price,0, ',', '.')}} VND</li>
					<li>{{$pro_item -> pro_sale}} % </li>
				</ul>
			</td>
			<td>{{$pro_item -> category -> c_name}}</td>
			<td>
				@if ($pro_item -> pro_number > 5)
				<a  class="label label-primary">{{ $pro_item -> pro_number}}</a>
				@else
				<a  class="label label-danger">{{ $pro_item -> pro_number}}</a>
				@endif
			</td>
			<td>
				{{ $pro_item -> pro_pay}}</span>
			</td>
			<td>
				{{ $pro_item -> pro_number - $pro_item -> pro_pay}}
			</td>
		</tr>
		@endforeach
		@endif

	</tbody>
</table>
</div>
<!-- Pagination -->
<div class="row text-center">
	<ul class="pagination">
		{{ $product->links() }}
	</ul>
</div>
<!-- /.row -->
@stop