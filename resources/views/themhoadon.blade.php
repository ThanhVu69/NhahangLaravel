<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm hóa đơn</title>
<link rel="icon" type="image/png" href="login1/images/icons/plus.png"/>
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
                        <li><a href="trangchu">Trang chủ</a></li>
                        <li><a href="hanghoa">Hàng hóa</a></li>
                        <li><a href="themhh">Thêm hàng hóa</a></li>
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
        	    <form action="themhh" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                	<label>Mã HH</label>
                    <input type="text" name="ma" class="form-control" placeholder="Mã hàng hóa" required />
                </div>
            	<div class="form-group">
                	<label>Tên hàng hóa</label>
                    <input type="text" name="Ten" class="form-control" placeholder="Tên hàng hóa" required />
                </div>
                <div class="form-group">
                	<label>Đơn vị tính</label>
                    <input type="text" name="DVTinh" class="form-control" placeholder="Đơn vị tính" required />
                </div>
                
                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>

</body>
</html>
