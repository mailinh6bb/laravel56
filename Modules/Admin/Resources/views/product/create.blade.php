@extends('admin::layouts.master')
@section('title','Sản Phẩm- Create')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.product') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.product') }}">Sản Phẩm</a></li>
		<li class="active">Thêm Mới</li>
	</ol>
	<h2>Thêm Mới Sản Phẩm</h2>
</div>
<div class="">
	@include('admin::product.form')
</div>
@stop