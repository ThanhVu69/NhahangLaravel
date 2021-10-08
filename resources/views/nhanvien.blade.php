<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nhân viên</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/png" href="login1/images/icons/people.png"/>
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

    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  @include('trangquanly.header')
@include('trangquanly.thanhmenu')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <section class="content-header">
      <h1>
        Công ty CP Toàn Phong
        <small>Bánh cuốn Gia An</small>
      </h1><br>
      @if($xem_ac[0]->quyen==1)
      <button type="button" name="add" id="add_data" class="btn btn-primary">Thêm nhân viên</button>
      @endif
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách nhân viên</h3>
   
    <br />
    <table id="student_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Vai trò</th>               
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div></div>
<!-- Thêm nhân viên -->
@if($xem_ac[0]->quyen==1)
<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Thêm nhân viên</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="Ten" id="Ten" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" name="Ngaysinh" id="Ngaysinh" class="form-control" required />
                    </div>
                    <div class="form-group">
                	<label>Số điện thoại</label>
                    <input type="text" name="SDT" id="SDT" class="form-control"/>
                    </div>
                    <div class="form-group">
                	<label>Địa chỉ</label>
                    <input type="text" name="DiaChi" id="DiaChi" class="form-control"  />
                </div>
                <div class="form-group">
                	<label>Vai trò</label>
                    <input type="text" name="Vaitro" id="Vaitro" class="form-control" />
                </div>
                </div>
                <div class="modal-footer">
                     <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<!-- Sửa nhân viên -->  
<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Sửa nhân viên</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="Ten" id="Ten" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" name="Ngaysinh" id="Ngaysinh" class="form-control" required />
                    </div>
                    <div class="form-group">
                	<label>Số điện thoại</label>
                    <input type="text" name="SDT" id="SDT" class="form-control"/>
                    </div>
                    <div class="form-group">
                	<label>Địa chỉ</label>
                    <input type="text" name="DiaChi" id="DiaChi" class="form-control"  />
                </div>
                <div class="form-group">
                	<label>Vai trò</label>
                    <input type="text" name="Vaitro" id="Vaitro" class="form-control" />
                </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>
</div>

<footer class="main-footer">
      <div class="pull-right ">
        <b>Cơ sở</b> Nguyễn Văn Lộc
      </div>
      <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong> 
    </footer>
    
   
  </div>
 
  
<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('nhanvien.getthemnhanvien') }}",
        "columns":[
            { "data": "Ten" },    
            { "data": "Ngaysinh" },       
            { "data": "SDT" },            
            { "data": "DiaChi" },
            { "data": "Vaitro" },      
            { "data": "action", orderable:false, searchable: false} 
             ]
     });
     
    $('#add_data').click(function(){
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Thêm');
    });

    $('#student_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('nhanvien.postthemnhanvien') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#student_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Thêm nhân viên');
                    $('#button_action').val('insert');
                    $('#student_table').DataTable().ajax.reload();
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('nhanvien.suanhanvien')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                $('#Ten').val(data.Ten);
                $('#Ngaysinh').val(data.Ngaysinh);
                $('#SDT').val(data.SDT);
                $('#DiaChi').val(data.DiaChi);
                $('#Vaitro').val(data.Vaitro);
                $('#student_id').val(id);
                $('#studentModal').modal('show');
                $('#action').val('Sửa');
                $('.modal-title').text('Sửa nhân viên');
                $('#button_action').val('update');
            }
        })
    });
    @if($xem_ac[0]->quyen==1)
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Bạn có muốn xóa nhân viên này không?"))
        {
            $.ajax({
                url:"{{route('nhanvien.xoanhanvien')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#student_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 
    @endif
});
</script>
</body>
</html>
