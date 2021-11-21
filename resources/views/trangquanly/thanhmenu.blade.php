<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img alt="User Image" class="user-image" src="/upload/nguoidung/{{Auth::user()->image}}" />
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{url('trangchu')}}"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa  fa-users"></i> <span>Quản lý cửa hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('nhanvien')}}"><i class="fa fa-circle-o"></i>Nhân viên</a></li>
                    <li><a href="{{url('monan')}}"><i class="fa fa-circle-o"></i>Món ăn</a></li>
                    <li><a href="{{url('hanghoa')}}"><i class="fa fa-circle-o"></i>Hàng hóa</a></li>
                    <li><a href="{{url('nhacungcap')}}"><i class="fa fa-circle-o"></i>Nhà cung cấp</a></li>
                    <li><a href="{{url('nguoidung')}}"><i class="fa fa-circle-o"></i>Người dùng</a></li>
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
                    <li><a href="{{url('hoadonban')}}"><i class="fa fa-circle-o"></i> Hóa đơn bán</a></li>
                    <li><a href="{{url('phieunhap')}}"><i class="fa fa-circle-o"></i> Phiếu nhập</a></li>
                    <li><a href="{{url('phieuxuat')}}"><i class="fa fa-circle-o"></i> Phiếu xuất</a></li>
                    <li><a href="{{url('phieuhuy')}}"><i class="fa fa-circle-o"></i> Phiếu hủy hàng</a></li>
                    <li><a href="{{url('phieuton')}}"><i class="fa fa-circle-o"></i> Phiếu tồn hàng</a></li>
                    <li><a href="{{url('phieuchi')}}"><i class="fa fa-circle-o"></i> Phiếu chi</a></li>
                    <li><a href="{{url('phieutra')}}"><i class="fa fa-circle-o"></i> Phiếu trả hàng</a></li>
                </ul>
            </li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Báo cáo thống kê</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('doanhthu')}}"><i class="fa fa-circle-o"></i> Doanh thu</a></li>
                    <li><a href="{{url('tonghop')}}"><i class="fa fa-circle-o"></i> Tổng hợp</a></li>
                    <!-- <li><a href="{{url('baocaocuoingay')}}"><i class="fa fa-circle-o"></i> Báo cáo cuối ngày</a></li> -->
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>