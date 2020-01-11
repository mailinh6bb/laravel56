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

  <title>Admin- @yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="{{ asset('theme_admin/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  {{--   <script src="{{asset('theme_admin/js/ie-emulation-modes-warning.js')}}"></script> --}}

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Laravel 5.6</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li style="font-size: 20px;"><a href="#">Xin Chào: {{get_data_user('admins', 'name')}}</a></li>
            <li><a href="{{ route('admin.get.logout') }}">Thoát</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
     <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li  class="{{\Request::route()->getName() == 'admin.home' ? 'active' : ''}}"><a style="font-weight: bold;" href="{{ route('admin.home') }}">Trang Tổng Quan</a></li>
          <li class="{{\Request::route()->getName() == 'admin.get.list.category' ? 'active' : ''}}"><a href="{{ route('admin.get.list.category') }}">Danh Mục</a></li>
          <li  class="{{\Request::route()->getName() == 'admin.get.list.product' ? 'active' : ''}}"><a href="{{ route('admin.get.list.product') }}">Sản Phẩm</a></li>
          <li class="{{\Request::route()->getName() == 'admin.get.list.article' ? 'active' : ''}}"><a href="{{ route('admin.get.list.article') }}">Tin Tức</a></li>
          <li class="{{\Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : ''}}"><a href="{{ route('admin.get.list.transaction') }}">Đơn Hàng</a></li>
          <li class="{{\Request::route()->getName() == 'admin.get.list.user' ? 'active' : ''}}"><a href="{{ route('admin.get.list.user') }}">Thành Viên</a></li>
          <li class="{{\Request::route()->getName() == 'admin.get.list.contact' ? 'active' : ''}}"><a href="{{ route('admin.get.list.contact') }}">Liên Hệ</a></li>
          <li  class="{{\Request::route()->getName() == 'admin.get.list.rating' ? 'active' : ''}}"><a href="{{ route('admin.get.list.rating') }}">Đánh Giá</a></li>
          <li  class="{{\Request::route()->getName() == 'admin.get.list.warehouse' ? 'active' : ''}}"><a href="{{ route('admin.get.list.warehouse') }}">Kho Hàng</a></li>
          @role('adminFull')
          <li  class="dropdown" style="cursor: pointer;"> <a class="dropdown-toggle" data-toggle="dropdown">CTV ADMIN
            <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-center" style="left: 20px; color: blue">
              <li><a href="{{ route('admin.get.list.ctv') }}">Danh Sách CTV</a></li>
              <li><a href="{{ route('admin.get.list.role') }}">Quyền - Roles</a></li>
              <li><a href="{{ route('admin.get.list.permission') }}">Vai Trò - Permission</a></li>
            </ul>
          </li>
          @endrole
        </ul>
      </div>
      {{-- Phần Nội Dung --}}
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        {{-- Kiểm trả và thông báo   --}}
        @if (Session::has('flash_message'))
        <div class="alert alert-{!!Session::get('flash_level')!!} alert-dismissible"  style="width:600px; font-size: 16px; position: fixed; z-index: 2000 !important; top: 10px;left: 50%; transform: translateX(-50%); text-align: center; !important">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{!!Session::get('flash_message')!!}</strong>
        </div>
        @endif


        @yield('content')
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
      <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
      <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
      <script>
       CKEDITOR.replace('editor', {
          filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
          filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
          filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
          filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
          filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
          filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
      </script>

      @yield('script')
      
      {{-- js tự động load ảnh khi thêm và sửa sản phẩm --}}
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
