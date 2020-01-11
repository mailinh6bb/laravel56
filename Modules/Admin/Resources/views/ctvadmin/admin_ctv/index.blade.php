@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Công Tác Viên</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Cộng Tác Viên <a href="{{ route('admin.get.create.ctv') }}" class="pull-right" title="">Thêm Mới</a></h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Họ Tên</th>
				<th>Email</th>
				<th>Quyền</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if (isset($admin))
			@foreach ($admin as $a_item)
			<tr>
				<td>{{$a_item -> id}}</td>
				<td>{{$a_item -> name}}</td>
				<td>{{$a_item -> email}}</td>
				<td>
					@foreach ($a_item  -> roles as $ar_item)
					<ul>
						<li>{{$ar_item -> display_name}}</li>
					</ul>	
					@endforeach	
				</td>
				<td>
					<a href="{{ route('admin.get.edit.ctv', $a_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
					<a href="{{ route('admin.get.action.ctv',['delete', $a_item-> id]) }}"><i class="fas fa-trash-alt">Delete</i></a>
				</td>
			</tr>
			@endforeach
			@endif

		</tbody>
	</table>
</div>
@stop