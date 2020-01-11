@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Quyền - Roles</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Quyền <a href="{{ route('admin.get.create.role') }}" class="pull-right" title="">Thêm Mới</a></h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Quyền</th>
				<th>Tên Hiển Thị</th>
				<th>Vai Trò</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if (isset($roles))
			@foreach ($roles as $r_item)
			<tr>
				<td>{{$r_item -> id}}</td>
				<td>{{$r_item -> name}}</td>
				<td>{{$r_item -> display_name}}</td>
				<td>
					@foreach ($r_item  -> permissions as $p_item)
					<ul>
						<li>{{$p_item -> display_name}}</li>
					</ul>	
					@endforeach	
				</td>
				<td>
					<a href="{{ route('admin.get.edit.role', $r_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
					<a href="{{ route('admin.get.action.role',['delete', $r_item-> id]) }}"><i class="fas fa-trash-alt">Delete</i></a>
				</td>
			</tr>
			@endforeach
			@endif

		</tbody>
	</table>
</div>
@stop