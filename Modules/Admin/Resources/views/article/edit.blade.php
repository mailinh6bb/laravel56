@extends('admin::layouts.master')
@section('title','Danh Mục- Edit')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.article') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.article') }}">Danh Mục</a></li>
		<li class="active">Edit</li>
	</ol>
	<h2>Sửa Danh Mục</h2>
</div>
<div class="">
	@include('admin::article.form')
</div>
@stop