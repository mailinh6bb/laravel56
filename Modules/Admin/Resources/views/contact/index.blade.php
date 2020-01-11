@extends('admin::layouts.master')
@section('title','Liên Hệ')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Thành Viên</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Thành Viên </h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Họ Tên</th>
				<th>Tiêu Đề</th>
				<th>Email</th>
				<th>Nội Dung</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if ($contact)
			@foreach ($contact as $c_item)
			<tr>
				<td>{{$c_item -> id}}</td>
				<td>{{$c_item -> c_name}}</td>
				<td>{{$c_item -> c_title}}</td>
				<td>{{$c_item -> c_email}}</td>
				<td>{{$c_item -> c_content}}</td>
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