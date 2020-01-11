@extends('admin::layouts.master')
@section('title','Thành Viên')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Thành Viên</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Thành Viên <a href="{{ route('admin.get.create.user')}}" class="pull-right" title=""> Thêm Mới</a> </h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Họ Tên</th>
				<th>Email</th>
				<th>Số Điện Thoại</th>
				<th>Hình Ảnh</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if ($user)
			@foreach ($user as $u_item)
			<tr>
				<td>{{$u_item -> id}}</td>
				<td>{{$u_item -> name}}</td>
				<td>{{$u_item -> email}}</td>
				<td>{{$u_item -> phone}}</td>
				<td>{{$u_item -> avatar}}</td>

				<td>
					<a href="{{ route('admin.get.edit.user', $u_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
					<a href="{{ route('admin.get.action.user', ['delete', $u_item -> id]) }}"><i class="fas fa-trash-alt"> Delete</i></a>
				</td>
			</tr>
			@endforeach
			@endif

		</tbody>
	</table>
</div>
@stop