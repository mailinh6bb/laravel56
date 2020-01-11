<form action="" method="POST"> 
	{!!csrf_field()!!}
	
	<div class="form-group">
		<label for="name">Tên Vai Trò</label>
		<input type="text" class="form-control" name="name" value="{{old('name', isset($permissions) ? $permissions -> name : null)}}">
		@if ($errors->has('name'))
		<span class="error-text">
			{{ $errors->first('name') }}
		</span>
		@endif
	</div>
	<div class="form-group">
		<label for="display_name">Miêu Tả</label>
		<input type="text" class="form-control" name="display_name" value="{{old('display_name', isset($permissions) ? $permissions -> display_name : null)}}">
		@if ($errors->has('display_name'))
		<span class="error-text">
			{{ $errors->first('display_name') }}
		</span>
		@endif
	</div>
	<button type="submit" class="btn btn-primary">Lưu</button>
</form>