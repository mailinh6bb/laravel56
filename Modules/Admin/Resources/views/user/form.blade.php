<form action="" method="POST" enctype="multipart/form-data"> 
	{!!csrf_field()!!}
	<div class="form-group">
		<label for="exampleInputEmail1">Tên User</label>
		<div class="row">
			<div class="col-md-5">
				<input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="{{old('name', isset($user) ? $user -> name : null)}}">
			</div>
			<div class="col-md-4">
				@if ($errors->has('name'))
				<span class="error-text">
					{{ $errors->first('name') }}
				</span>
				@endif
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1"> Mật Khẩu</label>
		<div class="row">
			<div class="col-md-5">
				<input type="password" class="form-control" placeholder="mật khẩu" name="password" value ="">
			</div>
			<div class="col-md-4">
				@if ($errors->has('password'))
				<span class="error-text">
					{{ $errors->first('password') }}
				</span>
				@endif
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Nhập Lại Mật Khẩu</label>
		<div class="row">
			<div class="col-md-5">
				<input type="password" class="form-control" placeholder="mật khẩu" name="rePassword" value ="">
			</div>
			<div class="col-md-4">
				@if ($errors->has('password'))
				<span class="error-text">
					{{ $errors->first('password') }}
				</span>
				@endif
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Email</label>
		<div class="row">
			<div class="col-md-5">
				<input
				type="email" class="form-control" placeholder="email" 
				@if (\Request::route()->getName() == 'admin.get.edit.user')
				{{"disabled"}}
				@endif
				required name="email" value="{{old('email', isset($user) ? $user -> email : null)}}">
			</div>
			<div class="col-md-4">
				@if ($errors->has('email'))
				<span class="error-text">
					{{ $errors->first('email') }}
				</span>
				@endif
			</div>
		</div>		
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Địa Chỉ</label>
		<div class="row">
			<div class="col-md-5">
				<input type="text" class="form-control" placeholder="địa chỉ" name="address"  value="{{old('address', isset($user) ? $user -> address : null)}}">
			</div>
			<div class="col-md-4">
				@if ($errors->has('address'))
				<span class="error-text">
					{{ $errors->first('address') }}
				</span>
				@endif
			</div>
		</div>		
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Phone</label>
		<div class="row">
			<div class="col-md-5">
				<input type="number" class="form-control" placeholder="số điện thoại" name="phone"  value="{{old('phone', isset($user) ? $user -> phone : null)}}">
			</div>
			<div class="col-md-4">
				@if ($errors->has('phone'))
				<span class="error-text">
					{{ $errors->first('phone') }}
				</span>
				@endif
			</div>
		</div>		
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Avatar</label>
		<div class="row">
			<div class="col-md-5">
				<img id="out_img" src="{{ asset('images/no_image.PNG') }}"height="200px" width="300px" alt="">
				<input type="file" id="input_img" class="form-control" placeholder="hình ảnh" name="avatar" value="{{old('avatar', isset($user) ? $user -> avatar : null)}}">
			</div>
		</div>
		
	</div>
	<button type="submit" class="btn btn-primary">Lưu </button>
</form>