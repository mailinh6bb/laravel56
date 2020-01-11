@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.category') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.category') }}">Danh Mục</a></li>
		<li class="active">Thêm Mới</li>
	</ol>
	<h2>Thêm Mới Danh Mục</h2>
</div>
<div class="">
	@include('admin::category.form')
</div>
@stop