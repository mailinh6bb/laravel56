@extends('admin::layouts.master')
@section('title','User')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.user') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.user') }}">Danh Mục</a></li>
		<li class="active">Edit</li>
	</ol>
	<h2>Sửa User</h2>
</div>
<div class="">
	@include('admin::user.form')
</div>
@stop