<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sửa nhân viên</title>
<link rel="icon" type="image/png" href="login1/images/icons/fix.png"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#navbar{
	margin-top:50px;}
#tbl-first-row{
	font-weight:bold;}
#logout{
	padding-right:30px;}		
</style>
</head>
<body>

<div class="container">
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="{{url('trangchu')}}">Trang chủ</a></li>
                        <li><a href="{{url('nhanvien')}}">Nhân viên >></a></li>
                        <li><a>Nhân viên {{$nhanvien->Ten}}</a></li>
                	</ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-6">
            @if(count($errors) > 0)
            <div class="alert alert-danger">User exist!</div>
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div> 
            @endif
            
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        	    <form action="" method="post"> 
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                	<label>Mã NV</label>
                    <input type="text" name="ma" class="form-control" placeholder="Ma NV" value="{{$nhanvien->ma}}"/>
                </div>
                <div class="form-group">
                	<label>Họ và Tên</label>
                    <input type="text" name="Ten" class="form-control" placeholder="Ten" value="{{$nhanvien->Ten}}"/>
                </div>
                <div class="form-group">
                	<label>Ngày sinh</label>
                    <input type="date" name="Ngaysinh" class="form-control" placeholder="Ngaysinh" value="{{$nhanvien->Ngaysinh}}" />
                </div>
                <div class="form-group">
                	<label>SDT</label>
                    <input type="text" name="SDT" class="form-control" placeholder="SDT" value="{{$nhanvien->SDT}}"/>
                </div>
                <div class="form-group">
                	<label>Địa chỉ</label>
                    <input type="text" name="DiaChi" class="form-control" placeholder="DiaChi" value="{{$nhanvien->DiaChi}}" />
                </div>
                <div class="form-group">
                	<label>Vai trò</label>
                    <!-- <input type="text" name="Vaitro" class="form-control" placeholder="Vaitro" value="{{$nhanvien->Vaitro}}" /> -->
                    <select class="form-control" name="Vaitro">
                                <option>Vai trò</option>
                                <option>Trưởng ca</option>
                                <option>Bồi bàn</option>
                                <option>Bán hàng</option>
                                <option>Bảo vệ</option>
                            </select>
                </div>
                

                <button type="submit" class="btn btn-default">Sửa</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>





