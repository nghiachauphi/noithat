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
Auth::routes(['register' => true, 'reset' => true]);

//Route::get('/', 'HomeController@getHome')->name('home');
Route::get('/', 'HomeController@getWelcome')->name('home');

//contact
Route::get('/contact', [
    'uses' => 'ContactUsFormController@createForm'
])->name('contact');

Route::post('/contact', [
    'uses' => 'ContactUsFormController@ContactUsForm',
    'as' => 'contact.store'
]);

// Giỏ hàng
Route::get('/cart', 'RegisProductsController@list')->name('cart');
Route::post('/cart', 'BillController@send')->name('send-cart');


//Bill
Route::get('/bill', 'BillController@list')->name('bill');
Route::get('/bill/xoa/{id}', 'BillController@getXoa')->name('delete-donhang');
Route::post('/bill/xoa/{id}', 'BillController@postXoa');
Route::get('/bill/duyet/{id}', 'BillController@duyet')->name('duyet');

// Mã giảm giá
Route::get('/discount', 'DiscountCodeController@list')->name('list');
Route::get('/discount/them', 'DiscountCodeController@discountCodeAddForm')->name('discount-code-add-form');
Route::post('/discount/them', 'DiscountCodeController@discountCodeAdd')->name('discount-code-add');
Route::get('/discount/xoa/{id}', 'DiscountCodeController@getXoa');
Route::post('/discount/xoa/{id}', 'DiscountCodeController@postXoa');


// Sản phẩm
Route::get('/sanpham', 'SanPhamController@getDanhSach')->name('sanpham');
Route::get('/sanpham/them', 'SanPhamController@getThem');
Route::get('/sanpham/tim', 'SanPhamController@search');
Route::post('/sanpham/them', 'SanPhamController@postThem');
Route::get('/sanpham/sua/{id}', 'SanPhamController@getSua');
Route::post('/sanpham/sua/{id}', 'SanPhamController@postSua');
Route::get('/sanpham/xoa/{id}', 'SanPhamController@getXoa');
Route::post('/sanpham/xoa/{id}', 'SanPhamController@postXoa');

// danh mục

Route::get('/danhmuc', 'DanhMucController@getDanhSach')->name('danhmuc');
Route::get('/danhmuc/them', 'DanhMucController@getThem');
Route::post('/danhmuc/them', 'DanhMucController@postThem');
Route::get('/danhmuc/sua/{id}', 'DanhMucController@getSua');
Route::post('/danhmuc/sua/{id}', 'DanhMucController@postSua');
Route::get('/danhmuc/xoa/{id}', 'DanhMucController@getXoa');
Route::post('/danhmuc/xoa/{id}', 'DanhMucController@postXoa');
Route::post('/danhmuc/nhap', 'DanhMucController@postNhap');
Route::get('/danhmuc/xuat', 'DanhMucController@getXuat');

//Chi tiet sp
Route::get('/chitietsp/{id}', 'ChiTietSPController@getDanhSach')->name('chitietsp');
Route::get('/chitietsp/them/{id}', 'ChiTietSPController@getThem');
Route::post('/chitietsp/them/{id}', 'ChiTietSPController@postThem')->name('post.them');
Route::get('/chitietsp/sua/{id}', 'ChiTietSPController@getSua');
Route::post('/chitietsp/sua/{id}', 'ChiTietSPController@postSua');
Route::get('/chitietsp/xoa/{id}', 'ChiTietSPController@getXoa');
Route::post('/chitietsp/xoa/{id}', 'ChiTietSPController@postXoa');
Route::post('/chitietsp/nhap', 'ChiTietSPController@postNhap');
Route::get('/chitietsp/xuat', 'ChiTietSPController@getXuat');

//add sanpham
Route::get('/sanpham/add/{id}', 'RegisProductsController@getThem');
Route::post('/sanpham/add/{id}', 'RegisProductsController@postThem')->name('add-products');