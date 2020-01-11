@extends('admin::layouts.master')
@section('title', 'Trang Tổng Quan')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
  .highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
  }

  #container {
    height: 400px;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }
  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }
  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }
  .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
  }
  .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }
  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
  .col-lg-6.col-md-6.col-sm-6.col-xs-6:first-child {
    border-right: 2px solid #dedede;
  }
  h2
  {
    font-style: italic;
  }
  tbody {
    font-size: 14px;
  }
</style>

<div class="row placeholders" style="border-bottom: 1px solid #dedede; margin-bottom: 15px;">
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
    <span class="text-muted"  style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0">Sản Phẩm Mới</span>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">

    <span class="text-muted" style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0;">Thành Viên Mới</span>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">

    <span class="text-muted" style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0;">Liên Hệ Mới</span>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">

    <span class="text-muted" style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); color: white; margin: 0">Đánh Giá Mới</span>
  </div>
</div>
{{-- Biểu đồ doanh thu trong ngày và thàng --}}
<div class="row" style="border-bottom: 1px solid #dedede; margin-bottom: 15px;">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div id="container"></div>
    <p class="highcharts-description text-center" style="font-size: 15px; font-weight: bold;">
     Biểu Đồ Thống Kê Tổng Doanh Thu Website.
   </p>
 </div>
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <h2 class="sub-header"> <a href="{{ route('admin.get.list.transaction') }}">Danh Sách Đơn Hàng Mới Nhất</a></h2>
  <div class="table-responsive">
    <table class="table table-striped">
     <thead>
      <tr>
        <th>#</th>
        <th>Tên Khách Hàng</th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Thời Gian</th>
        <th>Tổng Tiền</th>
      </tr>
    </thead>
    <tbody>
      @if ($transaction)
      <?php $i = 1; ?>
      @foreach ($transaction as $tr_item)
      <tr>
        <td>{{$i}}</td>
        <td>{{$tr_item -> user -> name}}</td>
        <td>{{$tr_item -> tr_address}}</td>
        <td>{{$tr_item -> tr_phone}}</td>
        <td>
          @php
          // hiển thị tiếng việt
          \Carbon\Carbon::setLocale('vi'); 
          echo \Carbon\Carbon::createFromTimeStamp(strtotime($tr_item->created_at))->diffForHumans();
          @endphp
        </td>
        <td>
          {{ number_format($tr_item -> tr_total, 0, ',', '.')}} VND
        </td>
      </tr>
      <?php $i++ ?>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
</div>

{{-- end row --}}
<div class="row" >
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
   <h2 class="sub-header"> <a href="{{ route('admin.get.list.contact') }}">Danh Sách Liên Hệ Mới Nhất</a></h2>
   <div class="table-responsive">
    <table class="table table-striped">
     <thead>
      <tr>
        <th>#</th>
        <th>Họ Tên</th>
        <th>Tiêu Đề</th>
        <th>Email</th>
        <th>Nội Dung</th>
      </tr>
    </thead>
    <tbody>
      @if ($contact)
      <?php $i = 1; ?>
      @foreach ($contact as $c_item)
      <tr>
        <td>{{$i}}</td>
        <td>{{$c_item -> c_name}}</td>
        <td>{{$c_item -> c_title}}</td>
        <td>{{$c_item -> c_email}}</td>
        <td>{{$c_item -> c_content}}</td>
      </tr>
      <?php $i++; ?>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <h2 class="sub-header"> <a href="{{ route('admin.get.list.rating') }}">Danh Sách Đánh Giá Mới Nhất</a></h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên Thành Viên</th>
          <th>Sản Phẩm</th>
          <th>Nội Dung</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        @if ($rating)
        <?php $i = 1; ?>
        @foreach ($rating as $r_item)
        <tr>
          <td>{{$i}}</td>
          <td>{{isset($r_item -> user -> name) ? $r_item -> user -> name : '[NA]'}}</td>
          <td>{{isset($r_item -> product -> pro_name) ? $r_item -> product -> pro_name : '[NA]'}}</td>
          <td>{{$r_item -> ra_content}}</td>
          <td>{{$r_item -> ra_number}}</td>
        </tr>
        <?php $i++; ?>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection

@section('script')
<script>
// Create the chart
let data = "{{$dataMoney}}";

datahtml = JSON.parse(data.replace(/&quot;/g,'"'));
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Tổng Doanh Thu Trong Ngày Và Tháng!'
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Đơn Vị'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:f} VND'
      }
    }
  },

  series: [
  {
    name: "Tổng",
    colorByPoint: true,
    data: datahtml,
  }
  ]
});
</script>
@stop
