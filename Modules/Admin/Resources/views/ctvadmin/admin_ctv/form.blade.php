<form action="" method="POST"> 
	{!!csrf_field()!!}
	<div class="col-md-6">
		<div class="form-group">
			<label for="name">Họ Tên</label>
			<input type="text" class="form-control" name="name" value="{{old('name', isset($admin) ? $admin -> name : null)}}">
			@if ($errors->has('name'))
			<span class="error-text">
				{{ $errors->first('name') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<label for="password">Mật Khẩu</label>

			<input type="password" class="form-control" name="password" value="">
			@if ($errors->has('name'))
			<span class="error-text">
				{{ $errors->first('name') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<label for="password">Nhập Lại Mật Khẩu</label>
			<input type="password" class="form-control" name="rePassword" value="">
			@if ($errors->has('name'))
			<span class="error-text">
				{{ $errors->first('name') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input
			type="email" class="form-control" placeholder="email" 
			@if (\Request::route()->getName() == 'admin.get.edit.ctv')
			{{"disabled"}}
			@endif
			required name="email" value="{{old('email', isset($admin) ? $admin -> email : null)}}">
			@if ($errors->has('email'))
			<span class="error-text">
				{{ $errors->first('email') }}
			</span>
			@endif	
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Phone</label>
			<input type="number" class="form-control" placeholder="số điện thoại" name="phone"  value="{{old('phone', isset($admin) ? $admin -> phone : null)}}">

			@if ($errors->has('phone'))
			<span class="error-text">
				{{ $errors->first('phone') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Lưu</button>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="roles">Quyền</label>
			@if(!empty($roles))
			@foreach($roles as $role)
			<div>
				<input type="checkbox"
				@if (isset($admin_roles))
				@if (in_array($role-> id,$admin_roles))
				{{"checked"}}
				@endif
				@endif
				value="{{$role -> id}}" id="roles" name="roles[]"> {{ $role->display_name }}</input>
			</div>
			@endforeach
			@endif
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Avatar</label>
			<img id="out_img" src="{{ asset('images/no_image.PNG') }}"height="200px" width="300px" alt="">
			<input type="file" id="input_img" class="form-control" placeholder="hình ảnh" name="avatar" value="{{old('avatar', isset($admin) ? $admin -> avatar : null)}}">
		</div>
	</div>


</form>