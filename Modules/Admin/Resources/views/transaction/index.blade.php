@extends('admin::layouts.master')
@section('title','Đơn Hàng')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li><a href="#">Admin</a></li>
		<li><a href="#">Đơn Hàng</a></li>
		<li class="active">Danh Sách</li>
	</ol>
</div>
<div class="table-responsive">
	<h2> Quản Lý Đơn Hàng</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Khách Hàng</th>
				<th>Địa Chỉ</th>
				<th>Số Điện Thoại</th>
				<th>Thời Gian</th>
				<th>Tổng Tiền</th>
				<th>Trạng Thái</th>
				<th>Hủy Đơn Hàng</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<?php $i = 1;?>
			@foreach ($transaction as $tr_item)
			<tr>
				<td>{{$i}}</td>
				<td>{{$tr_item -> user -> name}}</td>
				<td>{{$tr_item -> tr_address}}</td>
				<td>{{$tr_item -> tr_phone}}</td>
				<td>
					@php
					// hiển thị tiếng việt
					\Carbon\Carbon::setLocale('vi'); 
					echo \Carbon\Carbon::createFromTimeStamp(strtotime($tr_item->created_at))->diffForHumans();
					@endphp
				</td>
				<td>
					{{ number_format($tr_item -> tr_total, 0, ',', '.')}} VND
				</td>
				<td>@if ($tr_item ->tr_status == 1 && $tr_item ->tr_cancel == 1)
					<a href="#" class="label label-danger">Đơn Đã Hủy</a>
					@elseif ($tr_item ->tr_status == 1 && $tr_item ->tr_cancel == 0 )
					<a href="" class="label label-success">Đã Xử Lý</a>
					@else
					<a href="{{ route('admin.get.active.transaction', ['status',$tr_item -> id]) }}" class="label label-default">Chờ Xử Lý</a>
					@endif
				</td>
				<td>
					@if ($tr_item ->tr_status == 1 && $tr_item ->tr_cancel == 1)
					<a href="#" class="label label-danger">Đơn Đã Hủy</a>
					@elseif ($tr_item ->tr_cancel == 0 &&  $tr_item ->tr_status == 1)
					<a href="#" class="label label-success">Đã Xử Lý</a>
					@else
					<a href="{{ route('admin.get.active.transaction',['cancel',$tr_item -> id]) }}" class="label label-default">Hủy Đơn</a>
					@endif
					
				</td>
				<td>
					
					<a href="{{ route('admin.get.active.transaction',['delete', $tr_item-> id]) }}"><i class="fas fa-trash-alt"> Delete</i></a>
					<a class="btn_customer_action js_order" data-id="{{$tr_item -> id}}" href="{{ route('admin.get.view.order', $tr_item-> id) }}"><i class="fas fa-eye"></i></a>

				</td>
			</tr>
			<?php $i++?>
			@endforeach	
		</tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModalOrder" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Chi Tiết Đơn Hàng #<b class="transaction_id"></b></h4>
			</div>
			<div class="modal-body" id="md_content">
				<p>Đơn Hàng Của Bạn</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
@stop
@section('script')
<script>
	$(function(){
		$(".js_order").click(function(event){
			event.preventDefault();
			let $this = $(this);
			let url = $this.attr('href');
			$("#md_content").html('');
			$(".transaction_id").text('').text($this.attr('data-id'));
			$("#myModalOrder").modal('show');
			$.ajax({
				url: url,
			}).done(function(result){	
				if (result){
					$("#md_content").append(result);
				}
			})

		})
	})
</script>
@stop