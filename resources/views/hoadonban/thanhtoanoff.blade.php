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
            <section class="content">
                <button class="btn btn-info"><i class="fa fa-arrow-left"></i> Trở về hóa đơn bán</a></button><br><br>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-primary" style="min-height: 500px">
                            <div class="box-body">
                                <h4>Mã hóa đơn: {{$hoadonban->ma}}{{$hoadonban->id}}</h4>
                                <h4>Thời gian: {{$hoadonban->Ngay}}</h4><br>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style=" text-align: center">Tên món ăn</th>
                                            <th style=" text-align: center">Số lượng</th>
                                            <th style=" text-align: center">Đơn giá</th>
                                            <th style="width:200px;text-align: center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cthdban as $cthdban)
                                        <tr style=" text-align: center">
                                            <td>{{$cthdban->monan->Ten}}</td>
                                            <td>{{$cthdban->SoLuong}}</td>
                                            <td>{{$cthdban->Dongia}}</td>
                                            <td>{{number_format($cthdban->TongTien)}}.000VNĐ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table><br>
                                <h4>Tổng tiền: {{$hoadonban->ThanhTien}}.000VNĐ</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6" align="center">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="form-group">
                                    <h4 style="color:red "><b>THANH TOÁN</b></h4>
                                    <form action="thanhtoanoff" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="form-group">
                                            <input type="hidden" value="{{$hoadonban->id}}" name="id_hoadonban"
                                                id="id_hoadonban" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="{{$hoadonban->ThanhTien}}" id="sob"
                                                style="width:150px" name="ThanhTien" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tổng tiền</label>
                                            <option value="{{$hoadonban->ThanhTien}}" id="sob" style="width:150px"
                                                name="ThanhTien" class="form-control">
                                                {{$hoadonban->ThanhTien}}</option>
                                        </div>
                                        <label>Khuyến mãi</label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-6" align=right>
                                                    <a href="#" class="label-success label"><i
                                                            class="fa fa-percent"></i></a>
                                                    <input type="number" name="khuyenmai1" id="soc" value=0
                                                        onkeyup="mult();" style="width:100px" class="form-control"
                                                        required />
                                                </div>
                                                <div class="col-xs-6" align=left>
                                                    <a href="#" class="label-success label">VNĐ</a>
                                                    <input type="number" name="khuyenmai2" id="sod" value=0
                                                        onkeyup="mult();" style="width:100px" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Phương thức thanh toán</label>
                                            <select class="form-control" style="width:150px; text-align:center" name="phuongthuc"
                                                id="phuongthuc">
                                                <option value="Tiền mặt">Tiền mặt</option>
                                                <option value="Thẻ ngân hàng">Thẻ ngân hàng</option>
                                                <option value="Chuyển khoản">Chuyển khoản</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Khách trả</label>
                                            <input type="number" name="Khachtra" id="soa" onkeyup="mult();"
                                                style="width:150px" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Trả lại khách</label>
                                            <input type="text" name="Tralai" id="ketqua" style="width:150px"
                                                class="form-control">
                                        </div>
                                        <input type="submit" name="submit" value="Thanh toán >>"
                                            class="btn btn-success" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                function mult() {
                    var a = document.getElementById("soa").value;
                    var b = document.getElementById("sob").value;
                    var c = document.getElementById("soc").value;
                    var d = document.getElementById("sod").value;
                    e = parseInt(a) - (parseInt(b) - (parseInt(b) * (parseInt(c) / 100)) - parseInt(d));
                    document.getElementById('ketqua').value = e;
                }
                </script>
                </table>

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
    <script>
    let btnBack = document.querySelector('button');
    btnBack.addEventListener('click', () => {
        window.history.back();
    });
    </script>

</body>

</html>