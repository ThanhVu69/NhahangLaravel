<div class="box">
    <div class="box-header">
        @if($xem_ac[0]->quyen==1)
        <a href="#" data-toggle="modal" class="btn btn-primary" data-target="#them"><i class="fa fa-plus"></i></a>
        @endif <br><br>
        <h3 class="box-title">Loại món ăn</h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr role="row">
                    <th>Mã</th>
                    <th>Tên</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($loaimonan as $hh)
                <tr>
                    <td>{{$hh->ma}}{{$hh->id}}</td>
                    <td>{{$hh->ten}}</td>
                    <td><a href="#" data-toggle="modal" class="btn btn-info btn-sm" data-target="#{{$hh->id}}"><i
                                class="fa fa-info"></i></a>
                    </td>
                    <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{$hh->id}}1"><i
                                class="fa fa-wrench"></i></a></td>
                    <td><a href="xoaloaimonan/{{$hh->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
            </tfoot>
        </table>
    </div>
</div>