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
    Route::get('themloaimonan','MonanController@getthemloaimonan');
    Route::post('themloaimonan','MonanController@postthemloaimonan');
    //Sửa loại món ăn
    Route::get('sualoaimonan/{id}','MonanController@getsualoaimonan');
    Route::post('sualoaimonan/{id}','MonanController@postsualoaimonan');
    //Xóa loại món ăn
    Route::get('xoaloaimonan/{id}','MonanController@getxoaloaimonan');

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

// Hàng hóa
    Route::get('hanghoa','HanghoaController@hanghoa',function(){
    })->middleware('adminLogin');
    // Thêm hàng hóa
    Route::get('themhanghoa','HanghoaController@getthemhanghoa');
    Route::post('themhanghoa','HanghoaController@postthemhanghoa');
    // Sửa hàng hóa
    Route::get('suahanghoa/{id}','HanghoaController@getsuahanghoa');
    Route::post('suahanghoa/{id}','HanghoaController@postsuahanghoa');
    //Xóa hàng hóa
    Route::get('xoahanghoa/{id}','HanghoaController@getxoahanghoa');
    
//Phiếu nhập
    Route::get('phieunhap','PhieuNhapXuatController@phieunhap');
    Route::get('phieunhapngay','PhieuNhapXuatController@phieunhapngay');
    //Chi tiết phiếu nhập
    Route::get('ctpnhap/{id}','PhieuNhapXuatController@ctpnhap');

//Phiếu xuất
    Route::get('phieuxuat','PhieuNhapXuatController@phieuxuat');
    Route::get('phieuxuatngay','PhieuNhapXuatController@phieuxuatngay');
    //Chi tiết phiếu xuất
    Route::get('ctpxuat/{id}','PhieuNhapXuatController@ctpxuat');

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
    Route::post('cthdban/suacthdban/{id}','HoadonController@postsuacthdban');
    Route::get('cthdban/xoacthdban/{id}','HoadonController@getxoacthdban');

//Doanh thu
    Route::get('doanhthu','DoanhthuController@doanhthu');
    Route::get('doanhthungay','DoanhthuController@doanhthungay');
    Route::get('doanhthuthang','MyController@doanhthuthang');
    Route::get('doanhthunam','MyController@doanhthunam');
    Route::get('exceldoanhthungay','DoanhthuController@exceldoanhthungay');

//Hàng bán
    Route::get('hangban','MyController@hangban');
    Route::get('xuatexcel','MyController@excel');
    Route::get('capnhat','MyController@capnhat');

//ORDER
    Route::get('order','OrderController@order');
    Route::get('giohang','OrderController@getgiohang');
    Route::post('giohang','OrderController@posgiohang');
    Route::get('themgiohang/{id}', 'OrderController@themgiohang');
    Route::patch('capnhatgiohang', 'OrderController@updategiohang'); 
    Route::delete('xoagiohang', 'OrderController@removegiohang');

//NHẬP HÀNG THÔ
    Route::get('nhaphangan', 'NhapXuatHangthoController@nhaphangan'); 
    Route::get('giohangannhap', 'NhapXuatHangthoController@getgiohangannhap');
    Route::post('giohangannhap','NhapXuatHangthoController@postgiohangannhap');
    Route::get('themnhaphangan/{id}', 'NhapXuatHangthoController@themnhaphangan');
    Route::patch('update-cart', 'NhapXuatHangthoController@updategiohangthonhap'); 
    Route::delete('remove-from-cart', 'NhapXuatHangthoController@removegiohangthonhap');

//XUẤT HÀNG THÔ
    Route::get('xuathangan','NhapXuatHangthoController@xuathangan');
    Route::get('giohanganxuat','NhapXuatHangthoController@getgiohanganxuat');
    Route::post('giohanganxuat','NhapXuatHangthoController@postgiohanganxuat');
    Route::get('themxuathangan/{id}', 'NhapXuatHangthoController@themxuathangan');

//BÁO CÁO HÀNG TỒN
    Route::get('baocaohangton','HangTonController@baocaohangton');
    Route::get('giobchangton','HangTonController@getgiobchangton');
    Route::post('giobchangton','HangTonController@postgiobchangton');
    Route::get('thembaocaohangton/{id}', 'HangTonController@thembaocaohangton');
    Route::patch('capnhatgiohangton', 'HangTonController@updategiohangton'); 
    Route::delete('xoagiohangton', 'HangTonController@removegiohangton');

    Route::get('baocaohangtondc','HangTonController@baocaohangtondc');
    Route::get('giobchangtondc','HangTonController@getgiobchangtondc');
    Route::post('giobchangtondc','HangTonController@postgiobchangtondc');
    Route::get('thembaocaohangtondc/{id}','HangTonController@thembaocaohangtondc');
    Route::patch('capnhatgiohangtondc', 'HangTonController@updategiohangtondc'); 
    Route::delete('xoagiohangtondc', 'HangTonController@removegiohangtondc');


//BÁO CÁO HÀNG HỦY
    Route::get('baocaohanghuy','HangHuyController@baocaohanghuy');
    Route::get('giobchanghuy','HangHuyController@getgiobchanghuy');
    Route::post('giobchanghuy','HangHuyController@postgiobchanghuy');
    Route::get('thembaocaohanghuy/{id}', 'HangHuyController@thembaocaohanghuy');




    