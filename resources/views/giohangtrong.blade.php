<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Giỏ hàng trống</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/png" href="login1/images/icons/empty.png"/>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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

  <header class="main-header">

    <!-- Logo Gia An -->
    <a href="#" class="logo">
      <img src="home/img/logo.jpg" width= "50px" height= "50px">
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!--Thông tin và đăng xuất -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="home/img/{{Auth::user()->image}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="home/img/{{Auth::user()->image}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->ChucVu}} :{{Auth::user()->name}}
                  <small>Cơ sở Nguyễn Văn Lộc</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="User" class="btn btn-default btn-flat">Thông tin</a>
                </div>
                <div class="pull-right">
                  <a href="dangxuat" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="home/img/{{Auth::user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">QUẢN LÝ CỬA HÀNG</li>
        <li><a href="trangchu"><i class="fa fa-home"></i>Trang chủ</a></li>
        <li class="active treeview menu-open">
        <a href="#">
            <i class="fa  fa-users"></i> <span>Quản lý nội bộ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="nhanvien"><i class="fa fa-circle-o"></i>Nhân viên</a></li>
            <li><a href="monan"><i class="fa fa-circle-o"></i>Món ăn</a></li>
            <li><a href="hanghoa"><i class="fa fa-circle-o"></i>Hàng hóa</a></li>
            <li><a href="coso"><i class="fa fa-circle-o"></i>Cơ sở khác</a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa  fa-calculator"></i>
            <span>Quản lý giao dịch</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="phieunhap"><i class="fa fa-circle-o"></i> Phiếu nhập</a></li>
            <li><a href="phieuxuat"><i class="fa fa-circle-o"></i> Phiếu xuất</a></li>
            <li><a href="hoadonban"><i class="fa fa-circle-o"></i> Hóa đơn bán</a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Báo cáo thống kê</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="doanhthu"><i class="fa fa-circle-o"></i> Doanh thu</a></li>
            <li><a href="hangban"><i class="fa fa-circle-o"></i> Hàng bán</a></li>
            <li><a href="hangkho"><i class="fa fa-circle-o"></i> Hàng khô</a></li>
          </ul>
        </li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

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
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i>Danh sách món ăn trống</h3>

          <p>
            Hãy vào MENU để thêm món ăn!
            <a href="homie">TRUY CẬP</a>
          </p>

          
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
    <div class="pull-right hidden-xs">
      <b>Cơ sở</b> Nguyễn Văn Lộc
    </div>
    <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
             

              
            </a>
          </li>
          
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      
        
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

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
</html>
