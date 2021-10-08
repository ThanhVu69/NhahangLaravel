<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thanh toán</title>
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
                    <strong>Bàn số: </strong>{{$hoadonban->SoBan}}<br><br>
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
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cthdban as $cthdban)
                    <tr style=" text-align: center">
                      <td>{{$cthdban->monan->Ten}}</td>
                      <td>{{$cthdban->SoLuong}}</td>
                      <td>{{$cthdban->Dongia}}</td>
                      <td>{{$cthdban->TongTien}}</td>
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
                          <div class="col-xs-9"></div>
                            <div class="col-xs-3" style=" text-align: left">
                            <label style="color:red ">Thanh toán</label><br>
                            <form action="thanhtoanoff" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                              <input type="hidden" value="{{$hoadonban->id}}" name="id_hoadonban" id="id_hoadonban" class="form-control" required />
                            </div>
                            <div class="form-group">
                            <label>Tổng tiền</label>
                              <option value="{{$hoadonban->ThanhTien}}" id="sob"  style="width:150px" name="ThanhTien" class="form-control">{{$hoadonban->ThanhTien}}</option>
                            </div>
                            <div class="form-group">
                              <input type="hidden" value="{{$hoadonban->ThanhTien}}" id="sob"  style="width:150px" name="ThanhTien" class="form-control"/>
                            </div>
                            <div class="form-group">
                              <label>Khách trả</label>
                              <input type="number" name="Khachtra" id="soa" style="width:150px" class="form-control"
                                required />
                            </div>
                            <input type= "button" class="btn btn-info" value="Trả lại khách" onClick="hieu()" />
                            <div class="form-group">
                              <div name="Tralai" id="ketqua" style="width:150px" class="form-control"> </div>
                            </div>
                            <input type="submit" name="submit" value="Thanh toán >>" class="btn btn-success" />
                          </div> </div> 

                          @else
                          <div class="col-xs-9"></div>
                            <div class="col-xs-3" style=" text-align: left">
                            <div class="form-group">
                              <option style="width:150px;">Khách trả: {{$hoadonban->Khachtra}}.000VNĐ</option>
                            </div>
                            <div class="form-group">
                            <option style="width:150px" >Trả lại khách: {{$hoadonban->Tralai}}.000VNĐ</option>
                            </div>
                          </div> </div> 
                          @endif
                        </td>
                      </tr>
    <script>
        function hieu(){
            //Lấy dữ liệu từ textBox:
            var a = document.getElementById("soa").value;
            var b = document.getElementById("sob").value;
            c= parseInt(a) - parseInt(b);
            document.getElementById("ketqua").innerHTML= c;
        }
    </script>
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