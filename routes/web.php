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
Route::get('logout', function(){
    auth()->logout();

    return back();
});
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

Route::get('/admin/contact', 'ContactUsFormController@getDanhSach');

// Giỏ hàng
Route::get('/cart', 'RegisProductsController@list')->name('cart');
Route::post('/cart', 'BillController@send')->name('send-cart');


//Bill
Route::get('/bill', 'BillController@list')->name('bill');
Route::get('/bill/xoa/{id}', 'BillController@getXoa')->name('delete-donhang');
Route::post('/bill/xoa/{id}', 'BillController@postXoa');
Route::get('/bill/duyet/{id}', 'BillController@duyet')->name('duyet');

// Mã giảm giá
Route::get('/admin/discount', 'DiscountCodeController@list')->name('list');
Route::get('/admin/discount/them', 'DiscountCodeController@discountCodeAddForm')->name('discount-code-add-form');
Route::post('/admin/discount/them', 'DiscountCodeController@discountCodeAdd')->name('discount-code-add');
Route::get('/admin/discount/xoa/{id}', 'DiscountCodeController@getXoa');
Route::post('/admin/discount/xoa/{id}', 'DiscountCodeController@postXoa');


// Sản phẩm
Route::get('/sanpham', 'SanPhamController@getDanhSach')->name('sanpham');
Route::get('/sanpham/tim', 'SanPhamController@search');

Route::get('/admin/sanpham', 'SanPhamController@getDanhSachAdmin');
Route::get('/admin/sanpham/them', 'SanPhamController@getThem');
Route::post('/admin/sanpham/them', 'SanPhamController@postThem');
Route::get('/admin/sanpham/sua/{id}', 'SanPhamController@getSua');
Route::post('/admin/sanpham/sua/{id}', 'SanPhamController@postSua');
Route::get('/admin/sanpham/xoa/{id}', 'SanPhamController@getXoa');
Route::post('/admin/sanpham/xoa/{id}', 'SanPhamController@postXoa');
Route::post('/admin/sanpham/nhap', 'SanPhamController@postNhap');
Route::get('/admin/sanpham/xuat', 'SanPhamController@getXuat');

// admin khach hang
Route::get('/admin/khachhang', 'KhachHangController@getDanhSach')->name('khachhang');

Route::post('/admin/khachhang/trangthai/{id}', 'KhachHangController@status');
//Route::post('/admin/sanpham/them', 'KhachHangController@postThem');
//Route::get('/admin/sanpham/sua/{id}', 'KhachHangController@getSua');
//Route::post('/admin/sanpham/sua/{id}', 'KhachHangController@postSua');
//Route::get('/admin/sanpham/xoa/{id}', 'KhachHangController@getXoa');
//Route::post('/admin/sanpham/xoa/{id}', 'KhachHangController@postXoa');
//Route::post('/admin/sanpham/nhap', 'KhachHangController@postNhap');
//Route::get('/admin/sanpham/xuat', 'KhachHangController@getXuat');

// danh mục

Route::get('/danhmuc', 'DanhMucController@getDanhSach')->name('danhmuc');

Route::get('/admin/danhmuc', 'DanhMucController@getDanhSachAdmin');
Route::get('/admin/danhmuc/them', 'DanhMucController@getThem');
Route::post('/admin/danhmuc/them', 'DanhMucController@postThem');
Route::get('/admin/danhmuc/sua/{id}', 'DanhMucController@getSua');
Route::post('/admin/danhmuc/sua/{id}', 'DanhMucController@postSua');
Route::get('/admin/danhmuc/xoa/{id}', 'DanhMucController@getXoa');
Route::post('/admin/danhmuc/xoa/{id}', 'DanhMucController@postXoa');
Route::post('/admin/danhmuc/nhap', 'DanhMucController@postNhap');
Route::get('/admin/danhmuc/xuat', 'DanhMucController@getXuat');

//Chi tiet sp
Route::get('/chitietsp/{id}', 'SanPhamController@chitietsp')->name('chitietsp');
Route::get('/chitietsp/them/{id}', 'ChiTietSPController@getThem');
Route::post('/chitietsp/them/{id}', 'ChiTietSPController@postThem')->name('post.them');
Route::get('/chitietsp/sua/{id}', 'ChiTietSPController@getSua');
Route::post('/chitietsp/sua/{id}', 'ChiTietSPController@postSua');
Route::get('/chitietsp/xoa/{id}', 'ChiTietSPController@getXoa');
Route::post('/chitietsp/xoa/{id}', 'ChiTietSPController@postXoa');
Route::post('/admin/chitietsp/nhap', 'ChiTietSPController@postNhap');
Route::get('/admin/chitietsp/xuat', 'ChiTietSPController@getXuat');

//add sanpham
Route::post('/sanpham/add/{id}', 'RegisProductsController@postThem')->name('add-products');

//search
Route::get('/search', 'SanPhamController@search');

//info
Route::get('/info','UserController@info');
Route::get('/sanpham-damua','UserController@sanpham_damua');
//Route::post('/info/{id}','UserController@upImage');
Route::post('/info/{id}','UserController@editInfo');
Route::get('/info/delete-info/{id}','UserController@getDeleteInfo');
Route::post('/info/delete-info/{id}','UserController@deleteInfo');
Route::post('/sanpham-damua/{id}','UserController@status_order')->name('accept-cart');
Route::post('/sanpham-damua/{id}','UserController@cancelOrder')->name('cancel-order');
//----------------------Admin----------------
Route::get('/admin', 'AdminController@admin')->name('admin');
Route::get('/admin/tables', 'AdminController@tables');