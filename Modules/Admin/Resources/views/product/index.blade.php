@extends('admin::layouts.master')
@section('title','Sản Phẩm')
@section('content')
<style>
	.rating .active {
		color: #ff9705;
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
	<h2> Quản Lý Sản Phẩm <a href="{{ route('admin.get.create.product') }}" class="pull-right" title=""><i class="fas fa-plus-circle"></i></a></h2>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Sản Phẩm</th>
				<th>Hình Ảnh</th>
				<th>Giá và Khuyến Mãi</th>
				<th>Danh Mục</th>
				<th>Trạng Thái</th>
				<th>Nổi Bật</th>
				<th>Thao Thác</th>
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
					<li> Số Lượng: <span>{{ $pro_item -> pro_number}}</span></li>
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
			<td><a href="{{ route('admin.get.action.product',['active', $pro_item -> id]) }}" class="label {{$pro_item ->getStatus($pro_item->pro_active)['class']}}">{{$pro_item ->getStatus($pro_item->pro_active)['name']}}</a>
			</td>
			<td><a href="{{ route('admin.get.action.product',['hot', $pro_item -> id]) }}" class="label {{$pro_item ->gethot($pro_item->pro_hot)['class']}}">{{$pro_item ->getHot($pro_item->pro_hot)['name']}}</a></td>
			<td>
				<a href="{{ route('admin.get.edit.product', $pro_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
				<a href="{{ route('admin.get.action.product',['delete', $pro_item-> id]) }}"><i class="fas fa-trash-alt"> Delete</i></a>
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