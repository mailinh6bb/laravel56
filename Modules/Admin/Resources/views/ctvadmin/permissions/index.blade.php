@extends('admin::layouts.master')
@section('title','Vai Trò - Permission')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Vai Trò</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Vai Trò <a href="{{ route('admin.get.create.permission') }}" class="pull-right" title="">Thêm Mới</a></h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Miểu Tả</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if (isset($permissions))
			@foreach ($permissions as $p_item)
			<tr>
				<td>{{$p_item -> id}}</td>
				<td>{{$p_item -> name}}</td>
				<td>{{$p_item -> display_name}}</td>
			</td>
			<td>
				<a href="{{ route('admin.get.edit.permission', $p_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
				<a href="{{ route('admin.get.action.permission',['delete', $p_item-> id]) }}"><i class="fas fa-trash-alt">Delete</i></a>
			</td>
		</tr>
		@endforeach
		@endif

	</tbody>
</table>
</div>
@stop