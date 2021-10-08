<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chi tiết hóa đơn</title>
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
  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
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
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Công ty CP Toàn Phong
          <small>Bánh cuốn Gia An</small>
        </h1><br>
        <a href="{{asset('hoadonban')}}" class="btn btn-success btn-sm">Quay lại hóa đơn bán</a>
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
                <div class="alert alert-info">
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
                  <div class="col-sm-4 invoice-col">
                    <address>
                      <strong>Cơ sở Nguyễn Văn Lộc</strong><br>
                      Số 1, dãy 16B5, Làng Việt Kiều Châu Âu, Nguyễn Văn Lộc<br>
                      (024) 66 56 54 05<br>
                      Thời gian phục vụ: 6h-21h<br>
                      Số chỗ: 60 chỗ
                    </address>
                  </div>
                  <div class="col-sm-4 invoice-col">
                    <strong>Mã HĐ: </strong> {{$hoadonban->ma}}{{$hoadonban->id}}<br><br>
                    <strong>Ngày: </strong>{{$hoadonban->Ngay}}<br><br>
                    <strong>Bàn số: </strong>{{$hoadonban->soban}}<br><br>
                    <strong>Nhân viên: </strong>{{$hoadonban->User->name}}
                  </div>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style=" text-align: center">Tên món ăn</th>
                      <th style=" text-align: center">Số lượng</th>
                      <th style=" text-align: center">Đơn giá</th>
                      <th style="width:200px;text-align: center">Thành tiền (nghìn VNĐ)</th>
                    <th></th>
                    <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cthdban as $cthdban)
                    <tr style=" text-align: center">
                      <td>{{$cthdban->monan->Ten}}</td>
                      <td>{{$cthdban->SoLuong}}</td>
                      <td>{{$cthdban->Dongia}}</td>
                      <td>{{$cthdban->TongTien}}</td>
                      @if ($hoadonban -> trangthai ==1)
                      <td><a href="#" class="btn btn-primary btn-sm" onclick="return confirm('Không thể sửa')">Sửa</a></td>
                      <td><a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Không thể xóa')">Xóa</a></td>
                      @else
                      <td><a href="/cthdban/suacthdban/{{$cthdban->id}}" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc chắn muốn sửa?')">Sửa</a></td>
                      <td><a href="/cthdban/xoacthdban/{{$cthdban->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Chú ý: Còn 1 loại món ăn sẽ không thể xóa')">Xóa</a></td>
                      @endif
                     
                    </tr>
                    @endforeach
                  </tbody>
                  </tfoot>
                  <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-xs-6" style=" text-align: center">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead><br>
                        <th style=" text-align: right;color: red; background-color: #FFFF99">Tổng tiền: {{$hoadonban->ThanhTien}}.000VNĐ</th>
                          <tr>
                        <td class="table-empty" colspan="2">
                          <div class="form-group">
                          @if ($hoadonban->trangthai !=1)
                            <label style="color:red ">Thêm món ăn</label><br>
                            <form action="cthdban" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                              <input type="hidden" value="{{$hoadonban->id}}" name="id_hoadonban" id="id_hoadonban" class="form-control" required />
                            </div>
                            <div class="form-group">
                              <label>Tên món ăn</label>
                            <select class="form-control" style="width:400px" name="id_monan" id="id_monan" placeholder="Thêm món ăn">
                              @foreach($monan as $ma)
                              <option value="{{$ma->id}}">{{$ma->Ten}}</option>
                              @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                              <label>Số lượng</label>
                              <input type="number" name="SoLuong" style="width:100px" id="SoLuong" class="form-control" value="1"
                                required />
                            </div>
                            
                            <div class="form-group">
                              <input type="hidden" value="{{$hoadonban->ThanhTien}}" name="ThanhTien" id="ThanhTien" class="form-control" required />
                            </div>
                            <input type="submit" name="submit" value="Thêm món ăn" class="btn btn-primary" />
                          </div>
                          @endif
                        </td>
                      </tr>
                      
                  </table>
                      
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
  </div>

  @include('trangquanly.footer')
  </div>

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