<header class="main-header">
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="nhaphangan" target="_blank">Nhập hàng</a></li>
                <li><a href="xuathangan" target="_blank">Xuất hàng</a></li>
                <li><a href="trahang" target="_blank">Trả hàng</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Báo cáo<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="baocaohangton" target="_blank">Hàng tồn</a></li>
                        <li class="divider"></li>
                        <li><a href="baocaohanghuy" target="_blank">Hàng hủy</a></li>
                        <li class="divider"></li>
                        <li><a href="phieuchi" target="_blank">Chi phí khác</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="{{url('order')}}" target="_blank" style="background-color:#ffff; color:#222d32"><b><i class="fa fa-file-o"></i> &nbsp; Gọi món</b></a></li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="User Image" class="user-image" src="/upload/nguoidung/{{Auth::user()->image}}" />
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img alt="User Image" class="user-image" src="/upload/nguoidung/{{Auth::user()->image}}" />
                            <p>
                                {{Auth::user()->ChucVu}} :{{Auth::user()->name}}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="dangxuat" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')"
                                    class="btn btn-default btn-flat">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>