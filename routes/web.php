<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Welcome
    // Route::get('/',function() {
    //     return view('trangchu');
    // });
// Đăng nhập, đăng xuất
    Route::get('dangnhap','MyController@getdangnhap');
    Route::post('dangnhap','MyController@postdangnhap');
    Route::get('dangxuat','MyController@getdangxuat');


// Trang Chủ
    Route::get('/','MyController@trangchu',function(){

    })->middleware('adminLogin');
    Route::get('trangchu','MyController@trangchu',function(){

    })->middleware('adminLogin');

    Route::get('trangchu','MyController@trangchu',function(){

    })->middleware('adminLogin');



// Món ăn
    Route::get('monan','MonanController@monan',function(){
    })->middleware('adminLogin');
// Thêm món ăn
    Route::get('themmonan','MonanController@getthemmonan');
    Route::post('themmonan','MonanController@postthemmonan');
//Sửa món ăn
    Route::get('suamonan/{id}','MonanController@getsuamonan');
    Route::post('suamonan/{id}','MonanController@postsuamonan');
//Xóa món ăn
    Route::get('xoamonan/{id}','MonanController@getxoamonan');


// NHÂN VIÊN: danh sách, thêm sửa xóa
// Nhân viên
    Route::get('nhanvien', 'NhanvienController@nhanvien')->name('nhanvien',function(){
    })->middleware('adminLogin');
    Route::get('nhanvien/getthemnhanvien', 'NhanvienController@getthemnhanvien')->name('nhanvien.getthemnhanvien');
    Route::post('nhanvien/postthemnhanvien', 'NhanvienController@postthemnhanvien')->name('nhanvien.postthemnhanvien');
    Route::get('nhanvien/suanhanvien', 'NhanvienController@suanhanvien')->name('nhanvien.suanhanvien');
    Route::get('nhanvien/xoanhanvien', 'NhanvienController@xoanhanvien')->name('nhanvien.xoanhanvien');
//KHÁCH ĐẶT BÀN
//Khách đặt bàn
    Route::get('khachdatban', 'MyController@khachdatban')->name('khachdatban',function(){
    })->middleware('adminLogin');
    Route::get('khachdatban/getthemkhachdatban', 'MyController@getthemkhachdatban')->name('khachdatban.getthemkhachdatban');
    Route::post('khachdatban/postthemkhachdatban', 'MyController@postthemkhachdatban')->name('khachdatban.postthemkhachdatban');
    Route::get('khachdatban/suakhachdatban', 'MyController@suakhachdatban')->name('khachdatban.suakhachdatban');
    Route::get('khachdatban/xoakhachdatban', 'MyController@xoakhachdatban')->name('khachdatban.xoakhachdatban');
// KHÔNG DÙNG NỮA
    // Danh sách nhân viên
    // Route::get('nhanvien','MyController@nhanvien',function(){
    // })->middleware('adminLogin');
    // Thêm nhân viên
    // Route::get('themnv','MyController@getthemnv');
    // Route::post('themnv','MyController@postthemnv');
    // Sửa nhân viên
    // Route::get('suanv/{id}','MyController@getsuanv');
    // Route::post('suanv/{id}','MyController@postsuanv');
    //Xóa nhân viên
    // Route::get('xoanv/{id}','MyController@getxoanv');

// HÀNG HÓA
//Danh sách hàng hóa
    Route::get('hanghoa','HanghoaController@hanghoa',function(){
    })->middleware('adminLogin');


// Thêm hàng hóa
    Route::get('themhh','HanghoaController@getthemhh');
    Route::post('themhh','HanghoaController@postthemhh');
// Sửa hàng hóa
    Route::get('suahh/{id}','HanghoaController@getsuahh');
    Route::post('suahh/{id}','HanghoaController@postsuahh');
//Xóa hàng hóa
    Route::get('xoahh/{id}','HanghoaController@getxoahh');
//BÌNH LUẬN
//Bình luận
    Route::get('binhluan','MyController@binhluan',function(){
    })->middleware('adminLogin');
//Xóa bình luận
    Route::get('xoabinhluan/{id}','MyController@getxoabinhluan');
// User
// Danh sách User
    Route::get('User','MyController@User');
// Thêm User
    Route::get('themuser','MyController@getthemuser');
    Route::post('themuser','MyController@postthemuser');
// Sửa User
    Route::get('suauser/{id}','MyController@getsuauser');
    Route::post('suauser/{id}','MyController@postsuauser');
//Xóa User
    Route::get('xoauser/{id}','MyController@getxoauser');

//Cơ sở khác:
//Danh sách cửa hàng khác
    Route::get('coso','CuahangController@coso',function(){
    })->middleware('adminLogin');
// Thêm cơ sở
    Route::get('themcs','CuahangController@getthemcs');
    Route::post('themcs','CuahangController@postthemcs');
// Sửa cơ sở
    Route::get('suacs/{id}','CuahangController@getsuacs');
    Route::post('suacs/{id}','CuahangController@postsuacs');
//Xóa cơ sở
    Route::get('xoacs/{id}','CuahangController@getxoacs');
//TIN TỨC
//Danh sách tin tức
    Route::get('tintuc','MyController@tintuc');
//Thêm tin tức
    Route::get('themtintuc','MyController@getthemtintuc');
    Route::post('themtintuc','MyController@postthemtintuc');
//Sửa tin tức
    Route::get('suatintuc/{id}','MyController@getsuatintuc');
    Route::post('suatintuc/{id}','MyController@postsuatintuc');
//Xóa tin tức
    Route::get('xoatintuc/{id}','MyController@getxoatintuc');
//HÓA ĐƠN
//Hóa đơn bán
    Route::get('hoadonban','HoadonController@hoadonban'); 
    Route::get('hdbanngay','HoadonController@hdbanngay');
    Route::get('xoahdban/{id}','HoadonController@getxoahdban');
//Thanh toán offline
    Route::get('thanhtoanoff/{id}','HoadonController@getthanhtoanoff');
    Route::post('thanhtoanoff/{id}','HoadonController@postthanhtoanoff');
//Xử lí thanh toán
    Route::get('xuli/{id}','HoadonController@xuli');
    Route::get('trangthai/{id}','HoadonController@trangthai');
//Chi tiết hóa đơn bán
    Route::get('cthdban/{id}','HoadonController@cthdban');
    Route::post('cthdban/{id}','HoadonController@postcthdban');
    Route::get('cthdban/suacthdban/{id}','HoadonController@getsuacthdban');
    Route::post('cthdban/suacthdban/{id}','HoadonController@postsuacthdban');
    Route::get('cthdban/xoacthdban/{id}','HoadonController@getxoacthdban');
//Hóa đơn bán online
    Route::get('hoadonbanonline','MyController@hoadonbanonline');
    Route::get('hdbanonlinengay','MyController@hdbanonlinengay');
//Chi tiết hóa đơn bán onine
    Route::get('cthdbanonline/{id}','MyController@cthdbanonline');
//Doanh thu
    Route::get('doanhthu','MyController@doanhthu');
    Route::get('doanhthungay','MyController@doanhthungay');
    Route::get('doanhthuthang','MyController@doanhthuthang');
    Route::get('doanhthunam','MyController@doanhthunam');
    Route::get('exceldoanhthungay','MyController@exceldoanhthungay');
//Doanh thu online
    Route::get('doanhthuonline','MyController@doanhthuonline');
    Route::get('doanhthuonlinengay','MyController@doanhthuonlinengay');
    Route::get('doanhthuonlinethang','MyController@doanhthuonlinethang');
    Route::get('doanhthuonlinenam','MyController@doanhthuonlinenam');
    Route::get('exceldoanhthuonlinengay','MyController@exceldoanhthuonlinengay');
//Tạo menu
    Route::get('homie','MyController@homie');
//thay nhieu phan
    Route::get('muanhieuphan/{id}','MyController@getManyAddCart');
//Mua hàng
    Route::get('muahang/{id}','MyController@getAddtoCart');
//Mua 1 phần
    Route::get('mua1phan/{id}','MyController@getAddCart');
    Route::patch('update1', 'MyController@update1'); 
//Giỏ hàng
    Route::get('giohang1','MyController@giohang');
    Route::post('giohang1','MyController@postgiohang');
    Route::get('giohang','MyController@getgiohang');
    Route::post('giohang','MyController@posgiohang');
    Route::get('themgiohang/{id}', 'MyController@themgiohang');
    Route::patch('capnhatgiohang', 'MyController@updategiohang'); 
    Route::delete('xoagiohang', 'MyController@removegiohang');
//Xóa hết giỏ hàng
    Route::get('xoagiohang/{id}','MyController@getDelItemCart');
//Giỏ hàng trống
    Route::get('giohangtrong','MyController@giohangtrong');
//Đặt hàng thành công
    Route::get('dathangthanhcong','MyController@dathangthanhcong');
//Xóa 1 phần
    Route::get('xoa1phan/{id}','MyController@getDelCart');
//Tìm kiếm món ăn
    Route::get('search','MyController@search');
//Tìm kiếm Doanh thu
    Route::get('searchdoanhthu','MyController@searchdoanhthu');








//NHẬP HÀNG
    Route::get('nhaphangkho','MyController@nhaphangkho');
    Route::get('nhaphangan', 'MyController@nhaphangan'); 
    Route::get('giohangkhonhap','MyController@getgiohangkhonhap');
    Route::post('giohangkhonhap','MyController@postgiohangkhonhap');
    Route::get('giohangannhap', 'MyController@getgiohangannhap');
    Route::post('giohangannhap','MyController@postgiohangannhap');
    Route::get('themnhaphangkho/{id}', 'MyController@themnhaphangkho');
    Route::get('themnhaphangan/{id}', 'MyController@themnhaphangan');
    Route::patch('update-cart', 'MyController@update'); 
    Route::delete('remove-from-cart', 'MyController@remove');


//XUẤT HÀNG
    Route::get('xuathangkho','MyController@xuathangkho');
    Route::get('xuathangan','MyController@xuathangan');
    Route::get('giohangkhoxuat','MyController@getgiohangkhoxuat');
    Route::post('giohangkhoxuat','MyController@postgiohangkhoxuat');
    Route::get('giohanganxuat','MyController@getgiohanganxuat');
    Route::post('giohanganxuat','MyController@postgiohanganxuat');
    Route::get('themxuathangkho/{id}', 'MyController@themxuathangkho');
    Route::get('themxuathangan/{id}', 'MyController@themxuathangan');





//Giỏ hàng hóa trống
    Route::get('giohanghoatrong','GioHangController@giohanghoatrong');
//Thêm hàng hóa thành công
    Route::get('themhhthanhcong','GioHangController@themhhthanhcong');
//Xóa 1 phần hàng hóa
    Route::get('xoa1phanhh/{id}','MyController@xoa1phanhh');
//Tìm kiếm hàng hóa
    Route::get('searchhh','GioHangController@searchhh');
//Phiếu nhập
    Route::get('phieunhap','PhieuNhapXuatController@phieunhap');
    Route::get('phieunhapngay','PhieuNhapXuatController@phieunhapngay');
//Chi tiết phiếu nhập
    Route::get('ctpnhap/{id}','PhieuNhapXuatController@ctpnhap');





//Xuất hàng hóa thành công
    Route::get('xuathhthanhcong','GioHangController@xuathhthanhcong');
//Xóa 1 phần hàng hóa
    Route::get('xoa1phanhhh/{id}','MyController@xoa1phanhhh');
//Tìm kiếm hàng hóa
//Phiếu xuất
    Route::get('phieuxuat','PhieuNhapXuatController@phieuxuat');
    Route::get('phieuxuatngay','PhieuNhapXuatController@phieuxuatngay');
//Chi tiết phiếu xuất
    Route::get('ctpxuat/{id}','PhieuNhapXuatController@ctpxuat');


//BÁO CÁO HÀNG TỒN
    Route::get('baocaohangton','HangTonController@baocaohangton');
    Route::get('giobchangton','HangTonController@getgiobchangton');
    Route::post('giobchangton','HangTonController@postgiobchangton');
    Route::get('thembaocaohangton/{id}', 'HangTonController@thembaocaohangton');
    Route::get('baocaohangtondc','HangTonController@baocaohangtondc');
    Route::get('giobchangtondc','HangTonController@getgiobchangtondc');
    Route::post('giobchangtondc','HangTonController@postgiobchangtondc');
    Route::get('thembaocaohangtondc/{id}', 'HangTonController@thembaocaohangtondc');
//BÁO CÁO HÀNG HỦY
    Route::get('baocaohanghuy','BaoCaoHangHuyController@baocaohanghuy');
    Route::get('giobchanghuy','BaoCaoHangHuyController@getgiobchanghuy');
    Route::post('giobchanghuy','BaoCaoHangHuyController@postgiobchanghuy');
    Route::get('thembaocaohanghuy/{id}', 'BaoCaoHangHuyController@thembaocaohanghuy');
//hàng bán
    Route::get('hangban','MyController@hangban');
    Route::get('xuatexcel','MyController@excel');
    Route::get('capnhat','MyController@capnhat');
//hàng khô
    Route::get('hangkho','MyController@hangkho');
    Route::get('xuatexcelkho','MyController@excelkho');
//Tìm kiếm hàng tồn nhập
    Route::get('searchhangtonnhap','MyController@searchhangtonnhap');

//JSdemo 
    Route::get('JSan_hien','JSdemo@JSan_hien');
//TRANG BÁN HÀNG ONLINE
//Trang chủ bán hàng online
    Route::get('index','MyController@index');
//Trang thực đơn bán hàng online
    Route::get('menu','MyController@menu');
//Chi tiết sản phẩm
    Route::get('chitietsanpham/{id}','MyController@getchitietsanpham');
//Sản phẩm đóng gói Gia An
    Route::get('sanphamdonggoi','MyController@sanphamdonggoi');
//Ruốc tôm Gia An
    Route::get('ruoctom','MyController@ruoctom');
//Chả tôm Gia An
    Route::get('chatom','MyController@chatom');
//Chả mực Gia An
    Route::get('chamuc','MyController@chamuc');
//Thịt viên Gia An
    Route::get('thitvien','MyController@thitvien');
//Giới thiệu chung
    Route::get('gioithieuchung','MyController@gioithieuchung');
//Văn hóa Gia An
    Route::get('vanhoagiaan','MyController@vanhoagiaan');
//Lịch sử hình thành
    Route::get('lichsuhinhthanh','MyController@lichsuhinhthanh');
//Giá trị cốt lõi
    Route::get('giatricotloi','MyController@giatricotloi');
//Các danh hiệu
    Route::get('cacdanhhieu','MyController@cacdanhhieu');
//Giỏ hàng online
    Route::get('themgiohangonline/{id}', 'MyController@themgiohangonline',function(){

    })->middleware('Login');
    Route::get('giohangonline','MyController@getgiohangonline',function(){

    })->middleware('Login');
    Route::post('giohangonline','MyController@posgiohangonline');
    Route::patch('capnhatgiohangonline', 'MyController@updategiohangonline'); 
    Route::delete('xoagiohangonline', 'MyController@removegiohangonline');
//Thanh toán
    Route::get('thanhtoan','MyController@thanhtoan',function(){

    })->middleware('Login');
// Đăng nhập, đăng xuất
    Route::get('dangnhapuser','MyController@getdangnhapuser');
    Route::post('dangnhapuser','MyController@postdangnhapuser');
    Route::get('dangxuatuser','MyController@getdangxuatuser');
// Đăng ký khách hàng
    Route::get('dangkyuser','MyController@getdangkyuser');
    Route::post('dangkyuser','MyController@postdangkyuser');
// Người dùng
// Danh sách người dùng
    Route::get('nguoidung','MyController@nguoidung');
// Thêm người dùng
    Route::get('themnguoidung','MyController@getthemnguoidung');
    Route::post('themnguoidung','MyController@postthemnguoidung');
// Sửa người dùng
    Route::get('suanguoidung/{id}','MyController@getsuanguoidung');
    Route::post('suanguoidung/{id}','MyController@postsuanguoidung');
//Xóa người dùng
    Route::get('xoanguoidung/{id}','MyController@getxoanguoidung');
//Quên mật khẩu
    Route::get('quenmatkhau','MyController@quenmatkhau');
//Nhấp nháy
    Route::get('nhapnhay','MyController@nhapnhay');
//Cửa hàng
    Route::get('cuahang','MyController@cuahang');
//Reviews
    Route::get('reviews','MyController@reviews');
    Route::post('reviews','MyController@postreviews');
//Liên hệ
    Route::get('lienhe','MyController@lienhe');
    Route::post('lienhe','MyController@postlienhe');
//Tin tức
    Route::get('blog','MyController@blog');
    Route::get('blogdetail/{id}','MyController@blogdetail');
//Đặt bàn
    Route::get('datban','MyController@getdatban');
    Route::post('datban','MyController@postdatban');
//Nhân viên của hàng
    Route::get('nhanviencuahang','MyController@nhanviencuahang');

    