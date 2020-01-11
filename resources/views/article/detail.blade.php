@extends('layouts.app')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container-inner">
					<ul>
						<li class="home">
							<a href="{{ route('home') }}">Trang Chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="home" style="padding-top: 3px">
							<a href="{{ route('get.list.article') }}">Bài Viết</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->

<!-- contact-details start -->
<div class="main-contact-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8" style="border-right: 2px solid #f2f2f2">
				<!-- Blog Post -->
				
				<!-- Title -->
				<h1>{{ $article -> a_name}}</h1>
				<h4>- {{$article -> a_title}}</h4>
				<!-- Preview Image -->
				<img class="img-responsive" src="{{pare_url_file($article -> a_avatar)}}" style="  display: block;margin-left: auto; margin-right: auto;width: 90%; width: 800px; height: 500px;" alt="">
				{{-- Content Article --}}
				<p style="width: 700px; margin: 15px auto; font-size: 16px;color: #333;line-height: 28px;"> {!! $article -> a_content!!}</p>
				<!-- Date/Time -->
				<p>By Admin: 
					<span> 
						@php
						\Carbon\Carbon::setLocale('vi');
						echo \Carbon\Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans();
						@endphp
					</span>
				</p>
				<hr>



				<!-- Posted Comments -->

				<!-- Blog Comments -->
				@if (Auth::check())
				<!-- Comments Form -->
				<div class="well">
					<h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
					<form >
						{!!csrf_field()!!}
						<div class="form-group">
							<textarea class="form-control" rows="3" ></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Gửi</button>
					</form>
				</div>
				@else 
				<span>Đăng nhập để bình luận bài viết! <a class="btn btn-primary" style="padding: 5px 10px; border: 1px solid blue; border-radius: 5px;" href="{{ route('get.login') }}" title="">Đăng Nhập</a></span>
				@endif
				<hr>

				<!-- Comment -->
				@foreach ($comment as $cm)
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="" alt="">
					</a>
					<div class="media-body">
						<h4 style="font-size: 13px" class="media-heading">{!!$cm -> user -> name !!}</h4>
						<span>
							@php
							\Carbon\Carbon::setlocale('vi');
							echo \Carbon\Carbon::createFromTimeStamp(strtotime($cm->created_at))->diffForHumans();
							@endphp
						</span>
						<div>
							{!!$cm -> content!!}
						</div>
						<a href="javascript:void(0)" class="reply_comment" data-cm ="{{$cm -> id}}" style="color: white; background-color: #288AD6; padding: 5px 10px; font-size: 12px; border-radius: 5px;">Trả Lời</a>

						@if (isset($reply))
						@foreach ($reply as $rep_item)
						@if ($rep_item -> rep_comment_id == $cm -> id)
						<div style="border-bottom: 1px solid #f2f2f2; margin-left: 30px; margin-top: 10px;">
								<h4 class="media-heading"  style="font-size: 10px;">{!!$rep_item -> rep_name !!}</h4>
								<span>
									@php
									\Carbon\Carbon::setlocale('vi');
									echo \Carbon\Carbon::createFromTimeStamp(strtotime($rep_item->created_at))->diffForHumans();
									@endphp
								</span>
					
							
							<div style="font-size: 14px;">
								{!!$rep_item -> rep_content!!}
							</div>
						</div>
						@endif
						@endforeach
						@endif

						{{-- Phần Reply Comment --}}
						<div id="formComment{{$cm -> id}}" style="display:none;">
							<div style=" margin-top: 15px; width: 400px; margin-left: 30px;">
								Họ Tên: <input  type="text" class="form-control rep_name{{$cm -> id}}" value="">
								<br>
								Nội Dung:
								<textarea  id="rep_content{{$cm -> id}}" class="form-control" rows="3" placeholder="Vui lòng nhập đánh giá của bạn!"></textarea>
								<a href="{{ route('post.reply.comment', $article -> id) }}" class="btn btn-info btn_reply" data-rl="{{$cm -> id}}" style="background: #288ad6; margin: 10px;color: white; border-radius: 8px;">Trả Lời</a>
							</div>
						</div>

					</div>
				</div>
				@endforeach				
			</div>

			{{-- Phần Bài Viết Liên Quan --}}
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 20px">
				<h3>Bài Viết Mới Nhất</h3>
				<div class="list_article_hot" style="margin-top: 20px;">
					<div class="article_hot_item" style="border-bottom: 1px solid #dedede;">
						@if ($articleNew)
						@foreach ($articleNew as $new_item)
						<div class="row">
							<div class=" col-md-4 article_img" style="padding: 5px 5px">
								<a href="{{ route('get.detail.article', [$new_item -> a_slug, $new_item -> id]) }}">
									<img class="img-responsive" src="{{pare_url_file($new_item -> a_avatar)}}" style="width: 120px; height: 100px" alt="">
								</a>
							</div>
							<div class="col-md-8 article_info" style="padding: 5px 5px">
								<a href="{{ route('get.detail.article', [$new_item -> a_slug, $new_item -> id]) }}"><b>{{ $new_item -> a_title}}</b></a>
								<p>{{$new_item -> a_description}}</p>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
			{{-- End SecTion --}}
		</div>
	</div>
</div>

<!-- contact-details end -->
@stop
@section('script')
<script>
	$(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$(".reply_comment").click(function(event){
			event.preventDefault();
			let idUserArt = $(this).attr('data-cm');
			$("#formComment"+idUserArt).css("display",'block');

		});
		$(".btn_reply").click(function(){
			event.preventDefault();
			let idArtCmt = $(this).attr('data-rl');
			let rep_name = $(".rep_name"+idArtCmt).val();
			let rep_content = $("#rep_content"+idArtCmt).val();
			let url = $(this).attr('href');
			$.ajax({
				url: url,
				type:"POST",
				data: {
					rep_name: rep_name,
					idArtCmt: idArtCmt,
					rep_content: rep_content	
				},
				success: function(result){
					if (result.code == 1) {
						alert("Gởi Comment thành công! Cảm Ơn Bạn");
						location.reload();
					}
				}
			});			

		});	
	});
</script>
@stop