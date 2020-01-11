@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.user') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.user') }}">User</a></li>
		<li class="active">Thêm Mới</li>
	</ol>
	<h2>Thêm Mới User</h2>
</div>
<div class="">
	@include('admin::user.form')
</div>
@stop