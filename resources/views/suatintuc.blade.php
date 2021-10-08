<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa tin tức</title>
  <script src="them/js/lumino.glyphs.js"></script>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('trangquanly.header')
    @include('trangquanly.thanhmenu')
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
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Sửa tin tức</h3>
              </div>
              @if(count($errors) > 0)
            <div class="alert alert-danger">
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
              <div class="box-body">
                <div class="table table-bordered table-hover">
                  <form action="/suatintuc/{{$tintuc->id}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="row" style="margin-bottom:40px">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label>Tiêu đề</label>
                          <input required type="text" name="tieude" value="{{$tintuc->tieude}}" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Tóm tắt</label>
                          <textarea id="demo" name="tomtat" class="form-control ckeditor" >{{$tintuc->tomtat}}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Nội dung</label>
                          <textarea id="demo" name="noidung" class="form-control ckeditor"> {{$tintuc->noidung}}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Hình ảnh</label>
                          <p>
                          <img width="200px" src="/online/images/{{$tintuc->hinh}}">
                          </p>
                          <input type="file" name="hinh" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Nổi bật</label><br>
                          <label class="ra">Có
                            <input type="radio" @if($tintuc->noibat==1)checked @endif name="noibat" value="1">
                            <span class="checkmark"></span>
                          </label>
                          <label class="ra">Không
                            <input type="radio" @if($tintuc->noibat==0)checked @endif name="noibat" value="0">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                        <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                        <a href="{{asset('tintuc')}}" class="btn btn-danger">Hủy bỏ</a>
                      </div>
                    </div>
                  </form>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!--/.main-->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Cơ sở</b> Nguyễn Văn Lộc
      </div>
      <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong>
    </footer>

    <script type="text/javascript" language="javascript" src="/online/ckeditor/ckeditor.js"></script>

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
	<script src="them/js/jquery-1.11.1.min.js"></script>
	<script src="them/js/bootstrap.min.js"></script>
	<script src="them/js/chart.min.js"></script>
	<script src="them/js/chart-data.js"></script>
	<script src="them/js/easypiechart.js"></script>
	<script src="them/js/easypiechart-data.js"></script>
	<script src="them/js/bootstrap-datepicker.js"></script>
</body>

</html>
