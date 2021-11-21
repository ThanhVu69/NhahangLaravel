<div class="row">
    <div class="col-md-8">
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Các hóa đơn giá trị cao nhất</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Mã HĐ</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        @foreach($hoadonban as $product)
                        <tbody>
                            <tr>
                                <td>{{$product->ma}}{{$product->id}}</a></td>
                                <td>{{$product->ThanhTien}}.000VNĐ</td>
                                @if($product->trangthai == 1)
                                <td><span class="label label-success">Đã xử lý</span></td>
                                @else
                                <td><span class="label label-warning">Chưa xử lý</span></td>
                                @endif
                                <td>{{$product->Ngay}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
                <a href="{{url('hoadonban')}}" class="btn btn-sm btn-info btn-flat pull-left">Xem thêm</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Món ăn mới thêm</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($monan as $ma)
                    <li class="item">
                        <div class="product-img">
                            <img src="/upload/monan/{{$ma->image}}" alt="Product Image" />
                        </div>
                        <div class="product-info"><b>{{$ma->ma}}{{$ma->id}}</b><span
                                class="label label-info pull-right">{{$ma->dongia}}.000 VNĐ</span>
                            <span class="product-description">
                                {{$ma->Ten}}
                            </span>
                        </div>
                        @endforeach
                </ul>
            </div><!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{url('monan')}}" class="uppercase">Chi tiết</a>
            </div><!-- /.box-footer -->
        </div>
    </div>
</div>