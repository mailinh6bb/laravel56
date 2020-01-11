@extends('admin::layouts.master')
@section('title','Cộng Tác Viên')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.get.list.ctv') }}">Admin</a></li>
		<li><a  href="{{ route('admin.get.list.ctv') }}">Cộng Tác Viên</a></li>
		<li class="active">Thêm Mới</li>
	</ol>
	<h2>Thêm Mới Cộng Tác Viên</h2>
</div>
<div class="">
	@include('admin::ctvadmin.admin_ctv.form')
</div>
@stop