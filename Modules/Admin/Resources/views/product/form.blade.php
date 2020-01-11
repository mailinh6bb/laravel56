<form action="" method="POST" enctype="multipart/form-data"> 
	{!!csrf_field()!!}
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label for="pro_name">Tên Sản Phẩm</label>
				<input type="text" class="form-control" placeholder="Tên Sản Phẩm" name="pro_name" value="{{old('name', isset($product) ? $product -> pro_name : null)}}">
				@if ($errors->has('pro_name'))
				<span class="error-text">
					{{ $errors->first('pro_name') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="pro_description">Mô Tả Ngắn</label>
				<textarea class="form-control" name="pro_description" rows="2" placeholder="Mô Tả Ngắn">{{old('pro_description', isset($product) ? $product -> pro_description : null)}}</textarea>
				@if ($errors->has('pro_description'))
				<span class="error-text">
					{{ $errors->first('pro_description') }}
				</span>
				@endif
			</div>
			  <div class="form-group">
            <label>Nội Dung CKEDITOR</label>
            <textarea id="editor" cols="30" rows="10" class="ckeditor" name="pro_content">{{old('pro_content', isset($product) ? $product -> pro_content : null)}}</textarea>
            <script>
                var editor = CKEDITOR.replace('editor');
            </script>
        </div>
			<div class="form-group">
				<label for="pro_description_seo">Description</label>
				<input type="text" class="form-control" placeholder="Description" name="pro_description_seo" value="{{old('pro_description_seo', isset($product) ? $product -> pro_description_seo : null)}}">
			</div>
			<div class="form-group">
				<label for="pro_title_seo">Title Seo</label>
				<input type="text" class="form-control" placeholder="Description" name="pro_title_seo" value=" {{old('pro_title_seo', isset($product) ? $product -> pro_title_seo : null)}}">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" @if (isset($product))
				@if ($product -> pro_hot == 1)
				checked=""
				@endif	
				@endif
				value="1" name="pro_hot">
				<label class="form-check-label" for="pro_hot">Nổi Bật</label>
			</div>
			<button type="submit" class="btn btn-primary">Lưu </button>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="pro_category_id">Tên Danh Mục</label>
				<select name="pro_category_id" class="form-control">
					<option value="">--Chọn Loại Sản Phẩm</option>
					@if (isset($category))
					@foreach ($category as $c_item)
					<option
					
					@if (isset($product))
					@if ($product -> pro_category_id == $c_item -> id)
					{{"selected"}}
					@endif
					@endif
					value="{{$c_item -> id}}">{{$c_item->c_name}}
				</option>
				@endforeach
				@endif		
			</select>
			@if ($errors->has('pro_category_id'))
			<span class="error-text">
				{{ $errors->first('pro_category_id') }}
			</span>
			@endif
		</div>
		<div class="form-group">
			<label for="pro_price">Giá Sản Phẩm:</label>
			<input type="number" class="form-control" name="pro_price" value="{{old('pro_price', isset($product) ? $product -> pro_price : null)}}" placeholder="Giá Sản Phẩm">
		</div>
		<div class="form-group">
			<label for="pro_sale"> % Khuyến Mãi:</label>
			<input type="number" class="form-control" name="pro_sale" value="{{old('pro_sale', isset($product) ? $product -> pro_sale : null)}}" placeholder="% Giảm Giá">
		</div>
		<div class="form-group">
			<label for="pro_number"> Số Lượng:</label>
			<input type="number" class="form-control" name="pro_number" value="{{old('pro_number', isset($product) ? $product -> pro_number : null)}}" placeholder="nhập số lượng">
		</div>
		<div class="form-group">
			<label for="pro_avatar"> Avatar:</label>
			<img id="out_img" src="{{ asset('images/no_image.PNG') }}" height="250px" width="320px" alt="">
			<input type="file" id="input_img" class="form-control" name="pro_avatar">
		</div>
	</div>
</div>
</form>