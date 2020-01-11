@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Danh Mục</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Danh Mục <a href="{{ route('admin.get.create.category') }}" class="pull-right" title="">Thêm Mới</a></h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Danh Mục</th>
				<th>Title Seo</th>
				<th>Trạng Thái</th>
				<th>Hiện Home</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if ($category)
			@foreach ($category as $c_item)
			<tr>
				<td>{{$c_item -> id}}</td>
				<td>{{$c_item -> c_name}}</td>
				<td>{{$c_item -> c_title_seo}}</td>
				<td>
					<a href="{{ route('admin.get.action.category',['active', $c_item -> id]) }}" class="label {{$c_item -> getStatus($c_item->c_active)['class']}}" title="">{{$c_item -> getStatus($c_item->c_active)['name']}}</a>
				</td>
				<td><a href="{{ route('admin.get.action.category',['home', $c_item -> id]) }}" class="label {{$c_item -> getHome($c_item->c_home)['class']}}" title="">{{$c_item -> getHome($c_item->c_home)['name']}}</a>
				</td>
				<td>
					<a href="{{ route('admin.get.edit.category', $c_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
					<a href="{{ route('admin.get.action.category',['delete', $c_item-> id]) }}"><i class="fas fa-trash-alt">Delete</i></a>
				</td>
			</tr>
			@endforeach
			@endif
			
		</tbody>
	</table>
</div>
@stop