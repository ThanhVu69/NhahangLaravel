<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Người dùng</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('trangquanly.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('trangquanly.thanhmenu')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @if($xem_ac[0]->quyen==1)
                <a href="#" data-toggle="modal" class="btn btn-primary" data-target="#themuser">Thêm User</a>
                @endif
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Thông tin</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh đại diện</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>SĐT</th>
                                            <th>Chức vụ</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $us)
                                        <tr>
                                            <td><img style="width: auto; height:50px;"
                                                    src="upload/nguoidung/{{$us->image}}" /></td>
                                            <td>{{$us->name}}</td>
                                            <td>{{$us->DiaChi}}</td>
                                            <td>{{$us->SDT}}</td>
                                            <td>{{$us->ChucVu}}</td>
                                            @if($xem_ac[0]->quyen==1)
                                            <td><a href="xoanguoidung/{{$us->id}}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    class="btn btn-danger btn-sm">Xóa</a></td>
                                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#{{$us->id}}">Sửa</a></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
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
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="control-sidebar-home-tab">
                    </a>
                    </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- Thêm người dùng -->
    <div class="modal fade" id="themuser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm user</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="table table-bordered table-hover">
                            <form action="/themnguoidung" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input required type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên nhân viên"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input type="text" name="SDT" class="form-control" placeholder="SĐT" required />
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="DiaChi" class="form-control" placeholder="Địa chỉ"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ</label><br>
                                    <select class="form-control" name="ChucVu">
                                        <option value="Quản lý">Quản lý</option>
                                        <option value="Thu ngân">Thu ngân</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sửa người dùng -->
    @foreach($user as $us)
    <div class="modal fade" id="{{$us->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa user</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="table table-bordered table-hover">
                            <form action="/suanguoidung" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" value="{{$us->id}}" required />
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <p>
                                        <img style="width: auto; height:100px" src="/upload/nguoidung/{{$us->image}}" />
                                    </p>
                                    <input type="file" name="image" value class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Họ và tên </label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên NV"
                                        value="{{$us->name}}" required />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{$us->email}}" required />
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input type="text" name="SDT" class="form-control" placeholder="Số điện thoại"
                                        value="{{$us->SDT}}" />
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="DiaChi" class="form-control" placeholder="Địa chỉ"
                                        value="{{$us->DiaChi}}" />
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <select class="form-control" name="ChucVu" required>
                                        <option value="{{$us->ChucVu}}">{{$us->ChucVu}}</option>
                                        <option value="Quản lý">Quản lý</option>
                                        <option value="Thu ngân">Thu ngân</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                                <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                            </form>
                            <div class="clearfix"></div>
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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>