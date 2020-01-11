@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.ctv') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.ctv') }}"> Vai Trò</a></li>
		<li class="active">Thêm Mới</li>
	</ol>
	<h2>Thêm Mới Vai Trò</h2>
</div>
<div class="">
	@include('admin::ctvadmin.permissions.form')
</div>
@stop