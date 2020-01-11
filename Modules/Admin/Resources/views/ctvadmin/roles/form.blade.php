<form action="" method="POST"> 
	{!!csrf_field()!!}
	<div class="form-group">
		<label for="name">Quyền</label>
		<input type="text" class="form-control" placeholder="quyền" name="name" value="">
		@if ($errors->has('name'))
		<span class="error-text">
			{{ $errors->first('name') }}
		</span>
		@endif
	</div>

	<div class="form-group">
		<label for="display_name">Tên Hiển Thị</label>
		<input type="text" class="form-control" placeholder="Tên Hiển Thị" name="display_name" value="">
		@if ($errors->has('name'))
		<span class="error-text">
			{{ $errors->first('name') }}
		</span>
		@endif
	</div>
	<div class="form-group">
		<label for="roles">Vai Trò</label>
		@if(!empty($permissions))
		@foreach($permissions as $permission)
		<div>
			<input type="checkbox"
			@if (isset($permission_role))
			@if (in_array($permission-> id,$permission_role))
			{{"checked"}}
			@endif
			@endif
			value="{{$permission -> id}}" id="permissions" name="permissions[]"> {{ $permission->display_name }}</input>
		</div>
		@endforeach
		@endif
	</div>
	<input type="submit" name="" class="btn btn-info" value="Gởi">

</form>