<!-- Thêm món ăn -->
<div class="modal fade" id="themmonan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm món ăn</h5>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="table table-bordered table-hover">
                        <form action="themmonan" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Ảnh món ăn</label>
                                        <input required type="file" name="anh" class="form-control" require />
                                    </div>
                                    <div class="form-group">
                                        <label>Tên món ăn</label>
                                        <input required type="text" name="Ten" class="form-control" require />
                                    </div>
                                    <div class="form-group">
                                        <label>Thuộc loại món ăn</label><br>
                                        <select class="form-control" name="id_loaimonan" require>
                                            @foreach($loaimonan as $ch)
                                            <option value="{{$ch->id}}">{{$ch->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Đơn giá</label>
                                        <input required type="number" name="dongia" class="form-control" require />
                                    </div>
                                    <div class="form-group">
                                        <label>Đơn vị tính</label>
                                        <input required type="text" name="DVTinh" class="form-control" require />
                                    </div>
                                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                </div>
                            </div>
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