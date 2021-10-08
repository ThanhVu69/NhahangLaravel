<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sửa hóa đơn</title>
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
                        <li><a href="{{url('trangchu')}}">Trang chủ</a></li>
                        <li><a href="{{url('hoadonban')}}">Hóa đơn>></a></li>
                        <li><a>Mã {{$cthdban->hdban->ma}}{{$cthdban->hdban->id}}</a></li>
                        <form action="" method="post"> 
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <li><a><input type="hidden" name="id_hoadon" value="{{$cthdban->hdban->id}}" /></a></li>
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
                <div class="alert alert-info">
                    {{session('thongbao')}}
                </div>
            @endif
        	    <form action="" method="post"> 
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            	<div class="form-group">
                	<label>Tên món ăn</label>
                    <option type="text" name="id_monan" class="form-control"  value="{{$cthdban->id_monan}}">{{$cthdban->monan->Ten}}</option>
                </div>
                <div class="form-group">
                	<label>Số lượng</label>
                    <input type="number" name="SoLuong" class="form-control" value="{{$cthdban->SoLuong}}"/>
                </div>
                
                <div class="form-group">
                	<label>Đơn giá</label>
                    <option type="number"  class="form-control" value="{{$cthdban->Dongia}}">{{$cthdban->Dongia}}</option>
                </div>
                <div class="form-group">
                    <input type="hidden" name="Dongia" class="form-control" value="{{$cthdban->Dongia}}"/>
                </div>
                <div class="form-group">
                	<label>Tổng tiền</label>
                    <option type="text" class="form-control" value="{{$cthdban->TongTien}}">{{$cthdban->TongTien}}</option>
                </div>
                <div class="form-group">
                    <input type="hidden" name="TongTien" class="form-control" value="{{$cthdban->TongTien}}"/>
                </div>
                <div class="form-group">
                    <input type="hidden" name="ThanhTien" class="form-control" value="{{$cthdban->hdban->ThanhTien}}"/>
                </div>
                

                <button type="submit" class="btn btn-primary">Sửa</button>
                
            </form>
        </div>
    </div>
</div>

</body>
</html>





