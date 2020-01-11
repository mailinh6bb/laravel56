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


Auth::routes(); // Illum auth-> function route()
// phần đăng nhập và đắng ký cho user
Route::group(['namespace' => 'Auth'], function() {
	Route::get('dang-ky', 'RegisterController@getRegister')->name('get.register');
	Route::post('dang-ky', 'RegisterController@postRegister')->name('post.register');
	Route::get('/xac-nhan-email', 'RegisterController@verifyAccount')->name('get.verify.account');
	
	Route::get('dang-nhap', 'LoginController@getLogin')->name('get.login');
	Route::post('dang-nhap', 'LoginController@postLogin')->name('post.login');
	Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout');

	Route::get('lay-lai-mat-khau','ForgotPasswordController@getPassword')->name('get.password');
	Route::post('lay-lai-mat-khau','ForgotPasswordController@postPassword');
	Route::get('/reset-password','ForgotPasswordController@getResetPassword')->name('get.reset.password');
	Route::post('/reset-password','ForgotPasswordController@postResetPassword');
});
// trang chủ
Route::get('/', 'HomeController@index')->name('home');

// phần danh mục và chi tiết
Route::get('danh-muc/{slug}-{id}', 'CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham', 'CategoryController@getListProduct')->name('get.search.product');
Route::get('san-pham/{slug}-{id}', 'ProductDetailController@productDetail')->name('get.detail.product');
Route::get('/article', 'ArticleController@getArticle')->name('get.list.article');
Route::get('/article/{slug}-{id}', 'ArticleController@getDetailArticle')->name('get.detail.article');

// giỏ hàng
Route::group(['prefix' => 'shopping'], function() {
	Route::get('/add/{id}', 'ShoppingCartController@addProduct')->name('add.shopping.cart');
	Route::get('/list', 'ShoppingCartController@listProduct')->name('list.shopping.cart');
	Route::get('/delete/{id}', 'ShoppingCartController@deleteProduct')->name('delete.shopping.cart');
});

// thanh toán
Route::group(['prefix' => 'giohang', 'middleware' =>'CheckLogin'], function() {
	Route::get('/thanh-toan', 'ShoppingCartController@getFormPay')->name('get.form.pay');
	Route::post('/thanh-toan', 'ShoppingCartController@saveInfoShoppingCart');
});

// phần ajax
Route::group(['prefix' => 'ajax'], function() {
	Route::post('/danh-gia/{id}', 'RatingController@saveRating')->name('post.rating.product');
	Route::get('view-product', 'HomeController@viewProduct')->name('get.view.product');
	Route::get('search', 'HomeController@formSearch')->name('get.form.search');
	Route::post('/reply/{id}', 'HomeController@replyComment')->name('post.reply.comment');	
});

// thông tin người dùng
Route::group(['prefix' => 'user', 'middleware' =>'CheckLogin'], function() {
	Route::get('/', 'UserController@index')->name('get.user');
	Route::get('/info', 'UserController@getInfo')->name('get.info.user');
	Route::post('/info', 'UserController@postInfo');

});

// liên hẹ với chúng tôi
Route::get('lien-he', 'ContactController@getContact')->name('get.contact');
Route::post('lien-he', 'ContactController@postContact')->name('post.contact');

Route::get('/redirect/{social}', 'SocialAuthController@redirect')-> name('login.social.redirect.fb');
Route::get('/callback/{social}', 'ContactController@getContact')-> name('login.social.callback.fb');
