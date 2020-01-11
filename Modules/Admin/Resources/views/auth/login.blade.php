<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">
	<link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">

	<title>Admin- @yield('title','Đăng Nhập')</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="{{ asset('theme_admin/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{ asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	{{--   <script src="{{asset('theme_admin/js/ie-emulation-modes-warning.js')}}"></script> --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
</head>

<body>


	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Vui Lòng Đăng Nhập</h3>
					</div>
					{{-- hiện thị lỗi sửa --}}
					@if (count($errors) > 0)
					<div class= "alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if (session('thongbao'))
					<div class="alert alert-success">
						<ul>
							<li>{!!session('thongbao')!!}</li>
						</ul>
					</div>
					@endif
					<div class="panel-body">
						<form role="form" action="" method="POST">
							{!!csrf_field()!!}
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<button type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script>window.jQuery || document.write('<script src="{{asset('theme_admin/js/jquery.min.js')}}"><\/script>')</script>
    	<script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>
    	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    	<script src="{{asset('theme_admin/js/holder.min.js')}}"></script>
    	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    	<script src="{{asset('theme_admin/js/ie10-viewport-bug-workaround.js')}}"></script>

    	@yield('script')

    	<script>
    		function readURL(input) {
    			if (input.files && input.files[0]) {
    				var reader = new FileReader();

    				reader.onload = function(e) {
    					$('#out_img').attr('src', e.target.result);
    				}

    				reader.readAsDataURL(input.files[0]);
    			}
    		}
    		$("#input_img").change(function() {
    			readURL(this);
    		});
    	</script>
    </body>
    </html>
