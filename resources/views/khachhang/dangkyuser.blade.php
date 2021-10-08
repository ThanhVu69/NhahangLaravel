<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng ký khách hàng</title>
<link rel="icon" type="image/png" href="login1/images/icons/plus.png"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
    /* Customize the label (the container) */
    .ra {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 15px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .ra input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom radio button */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 15px;
      width: 15px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .ra:hover input~.checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .ra input:checked~.checkmark {
      background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .ra input:checked~.checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .ra .checkmark:after {
      top: 5px;
      left: 5px;
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: white;
    }
  </style>
<style>
#navbar{
	margin-top:50px;}
#tbl-first-row{
	font-weight:bold;}
#logout{
	padding-right:30px;}		
</style>
<style>
    div.nen1 {
        padding: 70px 0px;
		background: #ffffff url(online/images/nen1.jpg) no-repeat bottom center;
		background-size: cover;
    		 }
	div.nen4 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen4.jpg) no-repeat bottom center;
	background-size: cover;
			}
	div.nen3 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen3.jpg) no-repeat bottom center;
	background-size: cover;
			}
	</style>
</head>
<body>
<div class="nen4">
<div class="container">
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="index">Trang chủ</a></li>
                	</ul>
                </div>
            </nav>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-sm-6">
        <div>
        <div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">Lỗi!!!</div>
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div> 
            @endif
            <div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            </div>
        	    <form action="dangkyuser" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                	<label>Họ và tên </label>
                    <input type="text" name="name" class="form-control" placeholder="Họ và tên" required />
                </div>
                <div class="form-group">
                <label>Giới tính</label><br>
                    <label class="ra">Nam
                    <input type="radio" checked="checked" name="gioitinh" value="Nam">
                    <span class="checkmark"></span>
                    </label>
                    <label class="ra">Nữ
                    <input type="radio" name="gioitinh"  value="Nữ">
                    <span class="checkmark"></span>
                    </label></div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group">
                	<label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required />
                </div>
                <div class="form-group">
                	<label>Nhập lại mật khẩu</label>
                    <input type="password" name="re_password" class="form-control" placeholder="Nhập lại mật khẩu" required />
                </div>
                <div class="form-group">
                	<label>Số điện thoại</label>
                    <input type="text" name="SDT" class="form-control" placeholder="SĐT" required />
                </div>
                <div class="form-group">
                	<label>Địa chỉ</label>
                    <input type="text" name="DiaChi" class="form-control" placeholder="Địa chỉ" required />
                </div>
                <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>
