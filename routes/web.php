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

// Nhân viên
    Route::get('nhanvien', 'NhanvienController@nhanvien')->name('nhanvien',function(){
    })->middleware('adminLogin');
    Route::get('nhanvien/getthemnhanvien', 'NhanvienController@getthemnhanvien')->name('nhanvien.getthemnhanvien');
    Route::post('nhanvien/postthemnhanvien', 'NhanvienController@postthemnhanvien')->name('nhanvien.postthemnhanvien');
    Route::get('nhanvien/suanhanvien', 'NhanvienController@suanhanvien')->name('nhanvien.suanhanvien');
    Route::get('nhanvien/xoanhanvien', 'NhanvienController@xoanhanvien')->name('nhanvien.xoanhanvien');

// Loại món ăn
    Route::get('loaimonan','MonanController@loaimonan',function(){
    })->middleware('adminLogin');
    // Thêm loại món ăn
    Route::post('themloaimonan','MonanController@postthemloaimonan');
    //Sửa loại món ăn
    Route::post('sualoaimonan','MonanController@postsualoaimonan');
    //Xóa loại món ăn
    Route::get('xoaloaimonan/{id}','MonanController@getxoaloaimonan');

// Món ăn
    Route::get('monan','MonanController@monan',function(){
    })->middleware('adminLogin');
    // Thêm món ăn
    Route::post('themmonan','MonanController@postthemmonan');
    //Sửa món ăn
    Route::post('suamonan','MonanController@postsuamonan');
    //Xóa món ăn
    Route::get('xoamonan/{id}','MonanController@getxoamonan');

// Danh sách User
    Route::get('nguoidung','MyController@nguoidung',function(){
    })->middleware('adminLogin');
    Route::post('themnguoidung','MyController@postthemnguoidung');
    //Sửa user
    Route::post('suanguoidung','MyController@postsuanguoidung');
    //Xóa user
    Route::get('xoanguoidung/{id}','MyController@getxoanguoidung');

// Hàng hóa
    Route::get('hanghoa','HanghoaController@hanghoa',function(){
    })->middleware('adminLogin');
    // Thêm hàng hóa
    Route::post('themhanghoa','HanghoaController@postthemhanghoa');
    // Sửa hàng hóa
    Route::post('suahanghoa','HanghoaController@postsuahanghoa');
    //Xóa hàng hóa
    Route::get('xoahanghoa/{id}','HanghoaController@getxoahanghoa');
    
// Nhà cung cấp
    Route::get('nhacungcap','NhacungcapController@nhacungcap',function(){
    })->middleware('adminLogin');
    // Thêm nhà cung cấp
    Route::post('themnhacungcap','NhacungcapController@postthemnhacungcap');
    //Sửa nhà cung cấp
    Route::post('suanhacungcap','NhacungcapController@postsuanhacungcap');
    //Xóa nhà cung cấp
    Route::get('xoanhacungcap/{id}','NhacungcapController@getxoanhacungcap');

//Phiếu nhập
    Route::get('phieunhap','PhieuNhapXuatController@phieunhap');
    Route::get('phieunhapngay','PhieuNhapXuatController@phieunhapngay');
    Route::get('xoaphieunhap/{id}','PhieuNhapXuatController@getxoaphieunhap');
//Chi tiết phiếu nhập
    Route::get('ctpnhap/{id}','PhieuNhapXuatController@ctpnhap');
    Route::post('ctpnhap/{id}','PhieuNhapXuatController@postctpnhap');
    Route::post('suactpnhap','PhieuNhapXuatController@postsuactpnhap');
    Route::get('ctpnhap/xoactpnhap/{id}','PhieuNhapXuatController@getxoactpnhap');

//Phiếu xuất
    Route::get('phieuxuat','PhieuNhapXuatController@phieuxuat');
    Route::get('phieuxuatngay','PhieuNhapXuatController@phieuxuatngay');
    Route::get('xoaphieuxuat/{id}','PhieuNhapXuatController@getxoaphieuxuat');
//Chi tiết phiếu xuất
    Route::get('ctpxuat/{id}','PhieuNhapXuatController@ctpxuat');
    Route::post('ctpxuat/{id}','PhieuNhapXuatController@postctpxuat');
    Route::post('suactpxuat','PhieuNhapXuatController@postsuactpxuat');
    Route::get('ctpxuat/xoactpxuat/{id}','PhieuNhapXuatController@getxoactpxuat');

//Phiếu hủy
    Route::get('phieuhuy','PhieuHuyTonController@phieuhuy');
    Route::get('phieuhuyngay','PhieuHuyTonController@phieuhuyngay');
    Route::get('xoaphieuhuy/{id}','PhieuHuyTonController@getxoaphieuhuy');
//Chi tiết phiếu hủy
    Route::get('ctphuy/{id}','PhieuHuyTonController@ctphuy');
    Route::post('ctphuy/{id}','PhieuHuyTonController@postctphuy');
    Route::post('suactphuy','PhieuHuyTonController@postsuactphuy');
    Route::get('ctphuy/xoactphuy/{id}','PhieuHuyTonController@getxoactphuy');

//Phiếu tồn
    Route::get('phieuton','PhieuHuyTonController@phieuton');
    Route::get('phieutonngay','PhieuHuyTonController@phieutonngay');
    Route::get('xoaphieuton/{id}','PhieuHuyTonController@getxoaphieuton');
//Chi tiết phiếu tồn
    Route::get('ctpton/{id}','PhieuHuyTonController@ctpton');
    Route::post('ctpton/{id}','PhieuHuyTonController@postctpton');
    Route::post('suactpton','PhieuHuyTonController@postsuactpton');
    Route::get('ctpton/xoactpton/{id}','PhieuHuyTonController@getxoactpton');

// Phiếu chi
    Route::get('phieuchi','PhieuchiController@phieuchi',function(){
    })->middleware('adminLogin');
    // Thêm phiếu chi
    Route::post('themphieuchi','PhieuchiController@postthemphieuchi');
    //Sửa phiếu chi
    Route::post('suaphieuchi','PhieuchiController@postsuaphieuchi');
    //Xóa phiếu chi
    Route::get('xoaphieuchi/{id}','PhieuchiController@getxoaphieuchi');

//Phiếu trả hàng
    Route::get('phieutra','PhieutrahangController@phieutra');
    Route::get('phieutrangay','PhieutrahangController@phieutrangay');
    Route::get('xoaphieutra/{id}','PhieutrahangController@getxoaphieutra');
//Chi tiết phiếu trả hàng
    Route::get('ctptra/{id}','PhieutrahangController@ctptra');
    Route::post('ctptra/{id}','PhieutrahangController@postctptra');
    Route::post('suactptra','PhieutrahangController@postsuactptra');
    Route::get('ctptra/xoactptra/{id}','PhieutrahangController@getxoactptra');

//Cơ sở khác:
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
    Route::post('suacthdban','HoadonController@postsuacthdban');
    Route::get('cthdban/xoacthdban/{id}','HoadonController@getxoacthdban');

//Doanh thu
    Route::get('doanhthu','DoanhthuController@doanhthu');
    Route::get('doanhthungay','DoanhthuController@doanhthungay');
    Route::get('doanhthuthang','MyController@doanhthuthang');
    Route::get('doanhthunam','MyController@doanhthunam');
    Route::get('exceldoanhthungay','DoanhthuController@exceldoanhthungay');



//BẢNG TỔNG HỢP
    Route::get('tonghop','MyController@tonghop');
    Route::get('tonghopngay','MyController@tonghopngay');

//BÁO CÁO CUỐI NGÀY
    Route::get('baocaocuoingay','MyController@baocaocuoingay');

//ORDER
    Route::get('order','OrderController@order');
    Route::get('giohang','OrderController@getgiohang');
    Route::post('giohang','OrderController@postgiohang');
    Route::get('themgiohang/{id}', 'OrderController@themgiohang');
    Route::patch('capnhatgiohang', 'OrderController@updategiohang'); 
    Route::delete('xoagiohang', 'OrderController@removegiohang');

//NHẬP HÀNG HÓA
    Route::get('nhaphangan', 'NhapXuatHanghoaController@nhaphangan'); 
    Route::get('giohangannhap', 'NhapXuatHanghoaController@getgiohangannhap');
    Route::post('giohangannhap','NhapXuatHanghoaController@postgiohangannhap');
    Route::get('themnhaphangan/{id}', 'NhapXuatHanghoaController@themnhaphangan');
    Route::patch('update-cart', 'NhapXuatHanghoaController@updategiohangthonhap'); 
    Route::delete('remove-from-cart', 'NhapXuatHanghoaController@removegiohangthonhap');

//XUẤT HÀNG HÓA
    Route::get('xuathangan','NhapXuatHanghoaController@xuathangan');
    Route::get('giohanganxuat','NhapXuatHanghoaController@getgiohanganxuat');
    Route::post('giohanganxuat','NhapXuatHanghoaController@postgiohanganxuat');
    Route::get('themxuathangan/{id}', 'NhapXuatHanghoaController@themxuathangan');

//BÁO CÁO HÀNG TỒN
    Route::get('baocaohangton','HangTonController@baocaohangton');
    Route::get('giobchangton','HangTonController@getgiobchangton');
    Route::post('giobchangton','HangTonController@postgiobchangton');
    Route::get('thembaocaohangton/{id}', 'HangTonController@thembaocaohangton');
    Route::patch('capnhatgiohangton', 'HangTonController@updategiohangton'); 
    Route::delete('xoagiohangton', 'HangTonController@removegiohangton');

//BÁO CÁO HÀNG HỦY
    Route::get('baocaohanghuy','HangHuyController@baocaohanghuy');
    Route::get('giobchanghuy','HangHuyController@getgiobchanghuy');
    Route::post('giobchanghuy','HangHuyController@postgiobchanghuy');
    Route::get('thembaocaohanghuy/{id}', 'HangHuyController@thembaocaohanghuy');

//TRẢ HÀNG
    Route::get('trahang','TrahanghoaController@baocaohangtra');
    Route::get('giobchangtra','TrahanghoaController@getgiobchangtra');
    Route::post('giobchangtra','TrahanghoaController@postgiobchangtra');
    Route::get('thembaocaohangtra/{id}', 'TrahanghoaController@thembaocaohangtra');

//BÁO CÁO HÀNG BÁN
    Route::get('baocaohangban','MyController@baocaohangban');
    Route::get('giobchangban', 'NhapXuatHanghoaController@getgiobchangban');
    Route::post('giobchangban','NhapXuatHanghoaController@postgiobchangban');
    Route::get('themnhaphangan/{id}', 'NhapXuatHanghoaController@themnhaphangan');
    Route::patch('update-cart', 'NhapXuatHanghoaController@updategiohangthonhap'); 
    Route::delete('remove-from-cart', 'NhapXuatHanghoaController@removegiohangthonhap');

//BÁO CÁO EXCEL HÀNG HÓA
    Route::get('xuatexcel','MyController@excel');

//Test
    Route::get('test', 'TestController@index');
    Route::post('/daterange/fetch_data', 'TestController@fetch_data')->name('daterange.fetch_data');
   

    