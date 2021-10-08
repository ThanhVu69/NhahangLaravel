<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('home/img')}}/{{Auth::user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">QUẢN LÝ CỬA HÀNG</li>
        <li><a href="{{url('trangchu')}}"><i class="fa fa-home"></i>Trang chủ</a></li>
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
            <li><a href="{{url('nhanvien')}}"><i class="fa fa-circle-o"></i>Nhân viên</a></li>
            <li><a href="{{url('monan')}}"><i class="fa fa-circle-o"></i>Món ăn</a></li>
            <li><a href="{{url('hanghoa')}}"><i class="fa fa-circle-o"></i>Hàng hóa</a></li>
            <li><a href="{{url('coso')}}"><i class="fa fa-circle-o"></i>Cơ sở khác</a></li>
            <li><a href="{{url('tintuc')}}"><i class="fa fa-circle-o"></i>Tin tức</a></li>
            <li><a href="{{url('binhluan')}}"><i class="fa fa-circle-o"></i>Bình luận</a></li>
            <li><a href="{{url('nguoidung')}}"><i class="fa fa-circle-o"></i>Người dùng</a></li>
            <li><a href="{{url('index')}}"><i class="fa fa-circle-o"></i>Trang online</a></li>
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
            <li><a href="{{url('phieunhap')}}"><i class="fa fa-circle-o"></i> Phiếu nhập</a></li>
            <li><a href="{{url('phieuxuat')}}"><i class="fa fa-circle-o"></i> Phiếu xuất</a></li>
            <li><a href="{{url('hoadonban')}}"><i class="fa fa-circle-o"></i> Hóa đơn bán</a></li>
            <li><a href="{{url('hoadonbanonline')}}"><i class="fa fa-circle-o"></i> Hóa đơn online</a></li>
            <li><a href="{{url('khachdatban')}}"><i class="fa fa-circle-o"></i>Khách đặt bàn</a></li>
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
            <li><a href="{{url('doanhthu')}}"><i class="fa fa-circle-o"></i> Doanh thu</a></li>
            <li><a href="{{url('doanhthuonline')}}"><i class="fa fa-circle-o"></i> Doanh thu online</a></li>
            <li><a href="{{url('hangban')}}"><i class="fa fa-circle-o"></i> Hàng bán</a></li>
            <li><a href="{{url('hangkho')}}"><i class="fa fa-circle-o"></i> Hàng khô</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>