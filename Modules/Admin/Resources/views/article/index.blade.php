@extends('admin::layouts.master')
@section('title','Bài Viết')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="{{ route('admin.get.list.article') }}">Bài Viết</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
{{-- Tìm Kiếm Sản Phẩm --}}
<div class="row">
	<div class="col-sm-12">
		<form class="form-inline" action="" >
			<div class="form-group">
				<input type="text" class="form-control" name="name" value="{{\Request::get('name')}}" placeholder="Tìm Kiếm Bài Viết">
			</div>
			<button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
		</form>
	</div>	
</div>
<div class="table-responsive">
	<h2> Quản Lý Sản Phẩm <a href="{{ route('admin.get.create.article') }}" class="pull-right" title=""><i class="fas fa-plus-circle"></i></a></h2>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Bài Viết </th>
				<th>Hình Ảnh</th>
				<th>Mô Tả</th>
				<th>Trạng Thái</th>
				<th>Ngày Tạo</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			@if ($article)
			@foreach ($article as $art_item)
			<tr>
				<td>{{$art_item -> id}}</td>
				<td>{{$art_item -> a_name}}</td>
				<td>
					<img src="{{pare_url_file($art_item -> a_avatar)}}" width="100px" height="100px" alt="">
				</td>
				<td>{{$art_item -> a_description}}</td>
				<td><a href="{{ route('admin.get.action.article',['active', $art_item -> id]) }}" class="label {{$art_item ->getStatus($art_item->a_active)['class']}}">{{$art_item ->getStatus($art_item->a_active)['name']}}</a>
				</td>
				<td>
					@php
					// hiển thị tiếng việt
					\Carbon\Carbon::setLocale('vi'); 
					echo \Carbon\Carbon::createFromTimeStamp(strtotime($art_item->created_at))->diffForHumans();
					@endphp
				</td>
				<td>
					<a href="{{ route('admin.get.edit.article', $art_item -> id) }}"><i class="fas fa-edit"> Edit</i></a>
					<a href="{{ route('admin.get.action.article',['delete', $art_item-> id]) }}"><i class="fas fa-trash-alt"> Delete</i></a>
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
		{{-- 	{{ $product->links() }} --}}
	</ul>
</div>
<!-- /.row -->
@stop