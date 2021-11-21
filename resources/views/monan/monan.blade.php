<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Món ăn</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('trangquanly.header')
        @include('trangquanly.thanhmenu')

        <div class="content-wrapper">
            <section class="content-header">
            </section>
            @if(session('thongbao'))
            <div class="alert alert-info">
                {{session('thongbao')}}
            </div>
            @endif
            <section class="content">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="box">
                            <div class="box-header">
                                @if($xem_ac[0]->quyen==1)
                                <a href="#" data-toggle="modal" class="btn btn-primary" data-target="#themmonan"><i
                                        class="fa fa-plus"></i></a>
                                @endif <br><br>
                                <h3 class="box-title">Danh sách món ăn</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover"
                                    style="text-align: center">
                                    <thead>
                                        <tr role="row">
                                            <th></th>
                                            <th>Mã</th>
                                            <th>Tên</th>
                                            <th>Loại</th>
                                            <th>Đơn giá</th>
                                            <th>Đơn vị tính</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($monan as $hh)
                                        <tr>
                                            <td><img style="width: auto; height:50px;"
                                                    src="upload/monan/{{$hh->image}}" /></td>
                                            <td>{{$hh->ma}}{{$hh->id}}</td>
                                            <td>{{$hh->Ten}}</td>
                                            <td>{{$hh->loaimonan->ten}}</td>
                                            <td>{{$hh->dongia}}</td>
                                            <td>{{$hh->DVTinh}}</td>
                                            <td>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#{{$hh->id}}"><i class="fa fa-wrench"></i></a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="xoamonan/{{$hh->id}}"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                    @include('monan.loaimonan')
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Thêm món ăn -->
    @include('monan.themma')

    <!-- Sửa món ăn -->
    @include('monan.suama')

    <!-- Chi tiết món ăn -->
    @include('monan.chitietmonan')

    <!-- Thêm loại món ăn -->
    @include('monan.themloaima')

    <!-- Sửa loại món ăn -->
    @include('monan.sualoaima')

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
    </script>
</body>

</html>