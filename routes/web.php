<?php

use App\Models\Slide;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/dangnhap','App\Http\Controllers\UserController@getDangNhap');
Route::post('admin/dangnhap','App\Http\Controllers\UserController@postDangNhap');
Route::get('admin/logout', 'App\Http\Controllers\UserController@getDangXuat');
    
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function() {
    Route::get('home','App\Http\Controllers\AdminController@getAdminHome');
    
    Route::group(['prefix'=>'theloai'],function() {
        
        Route::get('danhsach','App\Http\Controllers\AdminController@getDanhSachTheLoai');

        Route::get('sua/{id}','App\Http\Controllers\AdminController@getSuaTheLoai');
        Route::post('sua/{id}','App\Http\Controllers\AdminController@postSuaTheLoai');

        Route::get('them','App\Http\Controllers\AdminController@getThemTheLoai');
        Route::post('them','App\Http\Controllers\AdminController@postThemTheLoai');

        Route::get('xoa/{id}','App\Http\Controllers\AdminController@getXoaTheLoai');
    });
    Route::group(['prefix'=>'loaitin'],function() {
        Route::get('danhsach','App\Http\Controllers\AdminController@getDanhSachLoaiTin');

        Route::get('them','App\Http\Controllers\AdminController@getThemLoaiTin');
        Route::post('them','App\Http\Controllers\AdminController@postThemLoaiTin');

        Route::get('sua/{id}','App\Http\Controllers\AdminController@getSuaLoaiTin');
        Route::post('sua/{id}','App\Http\Controllers\AdminController@postSuaLoaiTin');

        Route::get('xoa/{id}','App\Http\Controllers\AdminController@getXoaLoaiTin');

    });
    Route::group(['prefix'=>'tintuc'],function() {
        Route::get('danhsach','App\Http\Controllers\AdminController@getDanhSachTinTuc');

        Route::get('them','App\Http\Controllers\AdminController@getThemTinTuc');
        Route::post('them','App\Http\Controllers\AdminController@postThemTinTuc');

        Route::get('xoa/{id}','App\Http\Controllers\AdminController@getXoaTinTuc');

          Route::get('sua/{id}','App\Http\Controllers\AdminController@getSuaTinTuc');
        Route::post('sua/{id}','App\Http\Controllers\AdminController@postSuaTinTuc');

    });
     Route::group(['prefix'=>'slider'],function() {
        Route::get('danhsach','App\Http\Controllers\AdminController@getSlider');

        Route::get('them','App\Http\Controllers\AdminController@getThemSlider');
        Route::post('them','App\Http\Controllers\AdminController@postThemSlider');

        Route::get('xoa/{id}','App\Http\Controllers\AdminController@getXoaSlider');

          Route::get('sua/{id}','App\Http\Controllers\AdminController@getSuaTinTuc');
        Route::post('sua/{id}','App\Http\Controllers\AdminController@postSuaTinTuc');

    });
      Route::group(['prefix'=>'comment'],function() {
        Route::get('danhsach','App\Http\Controllers\AdminController@getComment');

        Route::get('xoa/{id}','App\Http\Controllers\AdminController@getXoaComment');

      

    });
    Route::group(['prefix' => 'ajax'], function() {
        Route::get('loaitin/{idTheLoai}','App\Http\Controllers\AjaxController@getLoaiTin');
        
    });
});
//Page trang chủ
Route::get('/','App\Http\Controllers\PageController@getTrangChu');
Route::get('lienhe','App\Http\Controllers\PageController@getLienHe');
Route::get('loaitin/{id}/{TenKhongDau}.html','App\Http\Controllers\PageController@getLoaiTin');
Route::get('chitiettintuc/{id}/{TieuDeKhongDau}.html','App\Http\Controllers\PageController@getChiTiet');
Route::get('dangnhap','App\Http\Controllers\PageController@getDangNhap');
Route::post('dangnhap','App\Http\Controllers\PageController@postDangNhap');
Route::get('dangky','App\Http\Controllers\PageController@getDangKy');
Route::post('dangky','App\Http\Controllers\PageController@postDangKy');
Route::get('dangxuat','App\Http\Controllers\PageController@getDangXuat');
Route::post('chitiettintuc/{id}/{TieuDeKhongDau}.html','App\Http\Controllers\PageController@postComment');
Route::get('timkiem','App\Http\Controllers\PageController@getTimKiem');