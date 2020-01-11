<form action="" method="POST"> 
	{!!csrf_field()!!}
	
	<div class="form-group">
		<label for="exampleInputEmail1">Tên Danh Mục</label>
		<div class="row">
			<div class="col-md-5">
				<input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="{{old('name', isset($category) ? $category -> c_name : null)}}">
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
		<label for="exampleInputEmail1">Icon</label>
		<div class="row">
			<div class="col-md-5">
				<input type="text" class="form-control" placeholder="Icon" name="icon" value ="{{old('icon', isset($category) ? $category -> c_icon : null)}} ">
			</div>
			<div class="col-md-4">
				@if ($errors->has('icon'))
				<span class="error-text">
					{{ $errors->first('icon') }}
				</span>
				@endif
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Meta Title</label>
		<div class="row">
			<div class="col-md-5">
				<input type="text" class="form-control" placeholder="Meta Title" name="c_title_seo"  value=" {{old('c_title_seo', isset($category) ? $category -> c_title_seo : null)}}">
			</div>
		</div>		
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Description Seo</label>
		<div class="row">
			<div class="col-md-5">
				<input type="text" class="form-control" placeholder="Description" name="c_description_seo" value=" {{old('c_description_seo', isset($category) ? $category -> c_description_seo : null)}}">
			</div>
		</div>
		
	</div>
	<div class="form-group form-check">
		<input type="checkbox" class="form-check-input" name="c_hot">
		<label class="form-check-label" for="exampleCheck1">Nổi Bật</label>
	</div>
	<button type="submit" class="btn btn-primary">Lưu </button>
</form>