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
							<a href="index.html">Trang Chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>	
						<li class="category3"><span>Bài Viết</span></li>
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
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="padding: 0px; border-right: 1px solid #dedede">
				@if (isset($article))
				@foreach ($article as $a_item)
				<div class="article" style="display: flex; border-bottom: 1px solid #dedede; margin-bottom: 10px; padding: 10px 0;" >
					<div class="article_avatar">
						<a href="{{ route('get.detail.article', [$a_item -> a_slug, $a_item -> id]) }}" title="">
							<img src="{{pare_url_file($a_item -> a_avatar)}}" style="width: 200px; height: 120px;" alt="">
						</a>
					</div>
					<div class="article_content" style="width: 90%; margin-left: 10px;">
						<a  href="{{ route('get.detail.article', [$a_item -> a_slug, $a_item -> id]) }}" title=""><h2 style="font-size: 15px;">{{ $a_item -> a_title}}</h2></a>
						<p>{!! $a_item -> a_description!!}</p>
						<p>By Admin: 
							<span> 
								@php
								echo \Carbon\Carbon::createFromTimeStamp(strtotime($a_item->created_at))->diffForHumans();
								@endphp
							</span>
						</p>
					</div>
				</div>
				@endforeach	
				{{$article -> links()}}
				@endif
			</div>
			{{-- Phần Bài Viết Liên Quan --}}
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h3>Bài Viết Đọc Nhiều</h3>
				<div class="list_article_hot" style="margin-top: 20px;">
					<div class="article_hot_item" style="border-bottom: 1px solid #f2f2f2;">
						@if ($articleHot)
						@foreach ($articleHot as $new_item)
						<div class="row">
							<div class=" col-md-4 article_img" style="padding: 5px 5px;">
								<a href="{{ route('get.detail.article', [$new_item -> a_slug, $new_item -> id]) }}">
									<img class="img-responsive" src="{{pare_url_file($new_item -> a_avatar)}}" style="width: 120px; height: 100px" alt="">
								</a>
							</div>
							<div class="col-md-8 article_info" style="padding: 5px 5px;">
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