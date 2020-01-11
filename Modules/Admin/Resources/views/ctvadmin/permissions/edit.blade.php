@extends('admin::layouts.master')
@section('title','Danh Mục')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.category') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.category') }}">Vai Trò</a></li>
		<li class="active">Edit</li>
	</ol>
	<h2>Sửa Vai Trò</h2>
</div>
<div class="">
	@include('admin::ctvadmin.permissions.form')
</div>
@stop