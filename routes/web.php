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

use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

Route::get('thu',function() {
    $theLoai = TheLoai::find(1);
    foreach ($theLoai->loaiTin as $loaitin) {
        echo $loaitin->Ten.'<br>';
    }
});

Route::get('thuview',function() {
    return view('admin.theloai.danhsach');
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach','TheLoaiController@getdanhsach');
        Route::get('sua/{id}','TheloaiController@getsua');
        Route::post('sua/{id}','TheloaiController@postSua');
        Route::get('them','TheloaiController@getthem');
        Route::post('them','TheloaiController@postThem');
        Route::get('xoa/{id}','TheloaiController@getXoa');
    });

    Route::group(['prefix'=>'loaitin'],function(){
        Route::get('danhsach','LoaiTinController@getdanhsach');
        Route::get('sua/{id}','LoaiTinController@getsua');
        Route::post('sua/{id}','LoaiTinController@postSua');
        Route::get('them','LoaiTinController@getthem');
        Route::post('them','LoaiTinController@postThem');
        Route::get('xoa/{id}','LoaiTinController@getXoa');
    });

    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','TinTucController@getdanhsach');
        Route::get('sua/{id}','TinTucController@getsua');
        Route::post('sua/{id}','TinTucController@postSua');
        Route::get('them','TinTucController@getthem');
        Route::post('them','TinTucController@postThem');
        Route::get('xoa/{id}','TinTucController@getXoa');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });
});