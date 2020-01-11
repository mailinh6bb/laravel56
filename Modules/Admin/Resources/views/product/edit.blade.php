@extends('admin::layouts.master')
@section('title','Danh Mục- Edit')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.product') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.product') }}">Sản Phẩm</a></li>
		<li class="active">Edit</li>
	</ol>
	<h2>Sửa Sản Phẩm</h2>
</div>
<div class="">
	@include('admin::product.form')
</div>
@stop