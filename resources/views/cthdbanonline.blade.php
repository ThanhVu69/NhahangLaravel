<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chi tiết hóa đơn online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/jpg" href="{{asset('login1/images/icons/invoice.jpg')}}" />
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('trangquanly.header')
    @include('trangquanly.thanhmenu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Công ty CP Toàn Phong
          <small>Bánh cuốn Gia An</small>
        </h1><br>

      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Bánh cuốn Gia An</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @if(session('thongbao'))
                <div class="alert alert-success">
                  {{session('thongbao')}}
                </div>
                @endif
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <address>
                      <strong>Công ty CP Toàn Phong</strong><br>
                      Số 70 Trung Hòa, Phường Trung Hòa, Quận Cầu Giấy, Hà Nội<br>
                      024 32321696<br>
                      <a href="accounting@toanphong.com.vn">accounting@toanphong.com.vn</a><br>
                      GPĐKKD: 0104133621 do sở Kế hoạch và đầu từ Hà Nội cấp ngày 26/08/2009
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 invoice-col">
                    <address>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                    <strong>Mã HĐ: </strong> {{$hoadonban->ma}}{{$hoadonban->id}}<br><br>
                    <strong>Ngày: </strong>{{$hoadonban->ngay}}<br><br>
                    <strong>Địa chỉ: </strong>{{$hoadonban->Khachhang->diachi}}<br><br>
                    <strong>Khách hàng: </strong>{{$hoadonban->Khachhang->ten}}
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style=" text-align: center">Tên món ăn</th>
                      <th style=" text-align: center">Số lượng</th>
                      <th style=" text-align: center">Đơn giá</th>
                      <th style="width:200px;text-align: center">Thành tiền (nghìn VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cthdban as $cthdban)
                    <tr style=" text-align: center">
                      <td>{{$cthdban->monan->Ten}}</td>
                      <td>{{$cthdban->soluong}}</td>
                      <td>{{$cthdban->dongia}}.000VNĐ</td>
                      <td>{{$cthdban->thanhtien}}.000VNĐ</td>
                    </tr>
                    @endforeach
                  </tbody>
                  </tfoot>
                  <div class="row">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-10" style=" text-align: center">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>

                      </table>
                    </div>
                  </div>
                  <!-- /.row -->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Cơ sở</b> Nguyễn Văn Lộc
    </div>
    <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong>
  </footer>

  </div>
  <!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('bower_components/chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>