<!-- Sửa món ăn -->
@foreach($monan as $hh)
<div class="modal fade" id="{{$hh->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa món ăn</h5>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="table table-bordered table-hover">
                        <form action="/suamonan" method="POST" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <input type="hidden" name="id" class="form-control" value="{{$hh->id}}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh món ăn</label>
                                        <p>
                                            <img style="width: auto; height:100px" src="/upload/monan/{{$hh->image}}" />
                                        </p>
                                        <input type="file" name="anh" value class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên món ăn</label>
                                        <input required type="text" name="Ten" class="form-control"
                                            value="{{$hh->Ten}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Thuộc loại món ăn</label>
                                        <select class="form-control" name="id_loaimonan">
                                            @foreach($loaimonan as $ch)
                                            <option @if($hh -> id_loaimonan == $ch->id)
                                                {{"selected"}}
                                                @endif
                                                value="{{$ch->id}}"> {{$ch->ten}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Đơn giá</label>
                                        <input required type="number" name="dongia" class="form-control"
                                            value="{{$hh->dongia}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Đơn vị tính</label>
                                        <input required type="text" name="DVTinh" class="form-control"
                                            value="{{$hh->DVTinh}}">
                                    </div>
                                    <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach