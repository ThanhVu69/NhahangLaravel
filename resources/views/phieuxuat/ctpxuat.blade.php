<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chi tiết phiếu xuất</title>
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
            <a href="{{url('phieuxuat')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Trở về phiếu xuất</a></><br><br>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-6" align=center>
                        <div class="box box-info" style="min-height:500px">
                            <div class="box-header">
                                <form action="ctpxuat" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <input type="hidden" value="{{$phieuxuat->id}}" name="id_phieuxuat"
                                            id="id_phieuxuat" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Tên hàng hóa</label>
                                        <select class="form-control" style="width:400px" name="id_hanghoa" id="id_hanghoa"
                                            placeholder="Thêm món ăn">
                                            @foreach($hanghoa as $ma)
                                            <option value="{{$ma->id}}">{{$ma->Ten}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @foreach($ct as $ct)
                                    <input type="hidden" name="id_hanghoadaco[{!! $ct->id_hanghoa !!}]"
                                        value="{{$ct->id_hanghoa}}" />
                                    @endforeach
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="number" name="SoLuong" style="width:100px" id="SoLuong"
                                            class="form-control" value="1" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$phieuxuat->ThanhTien}}" name="ThanhTien"
                                            id="ThanhTien" class="form-control" required />
                                    </div>
                                    <input type="submit" name="submit" value="Thêm hàng hóa" class="btn btn-primary" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Thêm hàng hóa -->
                    <div class="col-xs-6">
                        <div class="box box-danger" style="min-height:500px">
                            <div class="box-header">
                                <h3 class="box-title">Thêm hàng hóa</h3><br>
                                <h3 class="box-title">{{$phieuxuat->ma}}{{$phieuxuat->id}}</h3><br>
                            </div>
                            <div class="box-body">
                                @if(session('thongbao'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>{{session('thongbao')}}</strong> Vui lòng cập nhật lại số lượng!
                                </div>
                                @endif
                                @if(session('thanhcong'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>{{session('thanhcong')}}</strong> Số lượng hàng hóa đã được thay đổi!
                                </div>
                                @endif
                                @if(session('xoathanhcong'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>{{session('xoathanhcong')}}</strong>
                                </div>
                                @endif
                                @if(session('khongthexoa'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>{{session('khongthexoa')}}</strong><span> Món ăn không thể xóa khi chỉ còn 1 loại món ăn</span>
                                </div>
                                @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style=" text-align: center">Tên món ăn</th>
                                            <th style=" text-align: center">Số lượng</th>
                                            <th style=" text-align: center">Đơn giá</th>
                                            <th style="width:200px;text-align: center">Thành tiền (nghìn VNĐ)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ctpxuat as $cthdban)
                                        <tr style=" text-align: center">
                                            <td>{{$cthdban->hanghoa->Ten}}</td>
                                            <td><input style="width:70px; text-align:center" type="number"
                                                    value="{{$cthdban->SoLuong}}" readonly />
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#{{$cthdban->id}}">Cập nhật</a>
                                            </td>
                                            <td>{{$cthdban->hanghoa->gia}}</td>
                                            <!-- <a href="/cthdban/suacthdban/{{$cthdban->id}}"
                                                    class="btn btn-primary btn-sm">Cập nhật</a> -->
                                            <td>{{$cthdban->TongTien}}</td>
                                            <td><a href="/ctpxuat/xoactpxuat/{{$cthdban->id}}"
                                                    class="btn btn-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="box-header">
                                    <div class="form-group">
                                        <label><b style="color: #d73925">Tổng tiền:</b></label>
                                        {{$phieuxuat->ThanhTien}}.000VNĐ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" align=center>

                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('trangquanly.footer')
    </div>

    <!-- Sửa chi tiết phiếu xuất -->
    @foreach($cthdb as $ct)
    <div class="modal fade" id="{{$ct->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form action="/suactpxuat" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <input type="hidden" name="id_hanghoa" value="{{$ct->id_hanghoa}}" />
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" name="SoLuong" class="form-control" value="{{$ct->SoLuong}}" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value="{{$ct->hanghoa->gia}}" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="Dongia" class="form-control" value="{{$ct->hanghoa->gia}}" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value="{{$ct->TongTien}}" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="TongTien" class="form-control"
                                        value="{{$ct->TongTien}}" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="ThanhTien" class="form-control"
                                        value="{{$ct->phieuxuat->ThanhTien}}" />
                                </div>
                                <input type="hidden" name="id_phieuxuat" value="{{$ct->id_phieuxuat}}" />
                                <input type="hidden" name="id" value="{{$ct->id}}" />
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

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