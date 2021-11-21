<!-- Thêm loại món ăn -->
<div class="modal fade" id="them">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm loại món ăn</h5>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="table table-bordered table-hover">
                        <form action="themloaimonan" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Tên loại</label>
                                        <input required type="text" name="ten" class="form-control" require />
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