<!-- Chi tiết món ăn -->
@foreach($loaimonan as $hh)
<div class="modal fade" id="{{$hh->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$hh->ten}}</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr role="row">
                            <th>Tên</th>
                            <th>Đơn giá</th>
                            <th>Đơn vị tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monan as $gv)
                        @if($gv->id_loaimonan == $hh->id)
                        <tr>
                            <td>{{$gv->Ten}}</td>
                            <td>{{$gv->dongia}}</td>
                            <td>{{$gv->DVTinh}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach