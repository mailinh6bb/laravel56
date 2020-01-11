@if ($orders)
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Sản Phẩm</th>
				<th>Hình Ảnh</th>
				<th>Số Lượng</th>
				<th>Giá Thanh Toán</th>
				<th>Thao Thác</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach ($orders as  $od_item)
			<tr>
				<td>#{{$i}}</td>
				<td> <a href="{{ route('get.detail.product', [str_slug($od_item -> product -> pro_name), $od_item -> product -> id]) }}" target="_blank">{{$od_item -> product -> pro_name}}</a></td>
				<td>
					<img src="{{pare_url_file($od_item -> product ->pro_avatar)}}" width="100px" height="100px" alt="">
				</td>
				<td>{{$od_item -> or_qty}}</td>
				<td><li>{{number_format($od_item -> or_price,0, ',', '.')}} VND</li></td>
				<td><a href=""><i class="fas fa-trash-alt"> Delete</i></a></td>
			</tr>
			<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
</div>
</div>
@endif	
