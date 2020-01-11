@extends('admin::layouts.master')
@section('title','Tin Tức- Create')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.article') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.article') }}">Bài Viết</a></li>
		<li class="active">Thêm Mới</li>
	</ol>
	<h2>Thêm Mới Bài Viết</h2>
</div>
<div class="">
	@include('admin::article.form')
</div>
@stop