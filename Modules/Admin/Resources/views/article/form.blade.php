<form action="" method="POST" enctype="multipart/form-data"> 
	{!!csrf_field()!!}
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label for="a_name">Tên Bài Viết</label>
				<input type="text" class="form-control" placeholder="Tên bài viết" name="a_name" value="{{old('a_name', isset($article) ? $article -> a_name : null)}}">
				@if ($errors->has('a_name'))
				<span class="error-text">
					{{ $errors->first('a_name') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="a_title">Tiêu Đề </label>
				<textarea class="form-control" name="a_title" rows="2" placeholder="Mô Tả Ngắn">{{old('a_title', isset($article) ? $article -> a_title : null)}}</textarea>
				@if ($errors->has('a_title'))
				<span class="error-text">
					{{ $errors->first('a_title') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="a_description">Mô Tả Ngắn</label>
				<textarea class="form-control" name="a_description" rows="2" placeholder="Mô Tả Ngắn">{{old('a_description', isset($article) ? $article -> a_description : null)}}</textarea>
				@if ($errors->has('a_description'))
				<span class="error-text">
					{{ $errors->first('a_description') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="a_content">Nội Dung</label>
				<textarea  id="a_content" class="form-control ckeditor" name="a_content" rows="6" placeholder="Nội Dung">{{old('a_content', isset($product) ? $product -> a_content : null)}}</textarea>
				@if ($errors->has('a_content'))
				<span class="error-text">
					{{ $errors->first('a_content') }}
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="a_description_seo">Description Seo</label>
				<input type="text" class="form-control" placeholder="Description" name="a_description_seo" value="{{old('a_description_seo', isset($article) ? $article -> a_description_seo : null)}}">
			</div>
			<div class="form-group">
				<label for="a_title_seo">Title Seo</label>
				<input type="text" class="form-control" placeholder="Description" name="a_title_seo" value=" {{old('a_title_seo', isset($article) ? $article -> a_title_seo : null)}}">
			</div>
			<div class="form-group">
				<label for="a_avatarr"> Avatar:</label>
				<img id="out_img" src="{{ asset('images/no_image.PNG') }}" height="250px" width="320px" alt="">
				<input type="file" id="input_img" class="form-control" name="a_avatar">
			</div>
			<button type="submit" class="btn btn-primary">Lưu </button>
		</div>
	</div>
</form>`