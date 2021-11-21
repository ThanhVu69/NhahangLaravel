    <!-- Sửa loại món ăn -->
    @foreach($loaimonan as $hh)
    <div class="modal fade" id="{{$hh->id}}1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa loại món ăn</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="table table-bordered table-hover">
                            <form action="/sualoaimonan" method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-bottom:40px">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" value="{{$hh->id}}"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label>Tên loại món ăn</label>
                                            <input required type="text" name="ten" class="form-control"
                                                value="{{$hh->ten}}">
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