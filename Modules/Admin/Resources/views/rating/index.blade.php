@extends('admin::layouts.master')
@section('title','Đánh Giá')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Đánh Giá</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Đánh Giá </h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Thành Viên</th>
				<th>Sản Phẩm</th>
				<th>Nội Dung</th>
				<th>Rating</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if ($rating)
			@foreach ($rating as $r_item)
			<tr>
				<td>{{$r_item -> id}}</td>
				<td>{{isset($r_item -> user -> name) ? $r_item -> user -> name : '[NA]'}}</td>
				<td>{{isset($r_item -> product -> pro_name) ? $r_item -> product -> pro_name : '[NA]'}}</td>
				<td>{{$r_item -> ra_content}}</td>
				<td>{{$r_item -> ra_number}}</td>
				<td>
					<a href=""><i class="fas fa-trash-alt"> Delete</i></a>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</div>
@stop