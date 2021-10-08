<header class="main-header">
    <!-- Logo Gia An -->
    <a href="#" class="logo">
      <img src="{{asset('home/img/logo.jpg')}}" width= "50px" height= "50px">
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
              <img src="{{asset('home/img')}}/{{Auth::user()->image}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('home/img')}}/{{Auth::user()->image}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->ChucVu}} :{{Auth::user()->name}}
                  <small>Cơ sở Nguyễn Văn Lộc</small>
                </p>
              </li>
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="{{url('User')}}" class="btn btn-default btn-flat">Thông tin</a>
                </div> -->
                <div class="pull-right">
                  <a href="dangxuat" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>