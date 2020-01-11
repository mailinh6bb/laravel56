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
Route::group(['prefix' => 'auth'], function() {
	Route::get('login','AdminAuthController@getLogin')->name('admin.get.login');
	Route::post('login','AdminAuthController@postLogin');
	Route::get('logout','AdminAuthController@getLogout')->name('admin.get.logout');

});
Route::prefix('admin')->middleware(['CheckLoginAdmin'])->group(function() {
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::prefix("category")->middleware(['role:admin'])->group(function() {
		Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
		Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
		Route::post('/create','AdminCategoryController@store');
		Route::get('/update/{id}','AdminCategoryController@edit')-> name('admin.get.edit.category');	
		Route::post('/update/{id}','AdminCategoryController@update');
		Route::get('/{action}/{id}','AdminCategoryController@action')-> name('admin.get.action.category');
	});
	Route::group(['prefix' => 'product'], function() {
		Route::get('/','AdminProductController@index')->name('admin.get.list.product');
		Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
		Route::post('/create','AdminProductController@store');
		Route::get('/update/{id}','AdminProductController@edit')-> name('admin.get.edit.product');	
		Route::post('/update/{id}','AdminProductController@update');
		Route::get('/{action}/{id}','AdminProductController@action')-> name('admin.get.action.product');
	});

	Route::group(['prefix' => 'article'], function() {
		Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
		Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
		Route::post('/create','AdminArticleController@store');
		Route::get('/update/{id}','AdminArticleController@edit')-> name('admin.get.edit.article');	
		Route::post('/update/{id}','AdminArticleController@update');
		Route::get('/{action}/{id}','AdminArticleController@action')-> name('admin.get.action.article');
	});
	Route::group(['prefix' => 'warehouse'], function() {
		Route::get('/','AdminWareHouseController@index')->name('admin.get.list.warehouse');
		// Route::get('/create','AdminWareHouseController@create')->name('admin.get.create.warehouse');
		// Route::post('/create','AdminWareHouseController@store');
		// Route::get('/update/{id}','AdminWareHouseController@edit')-> name('admin.get.edit.warehouse');	
		// Route::post('/update/{id}','AdminWareHouseController@update');
		// Route::get('/{action}/{id}','AdminWareHouseController@action')-> name('admin.get.action.warehouse');
	});
	// quản lý đơn hàng
	Route::group(['prefix' => 'transaction'], function() {
		Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
		Route::get('/view/{id}','AdminTransactionController@viewOrder')-> name('admin.get.view.order');
		Route::get('/{active}/{id}','AdminTransactionController@actionTransaction')-> name('admin.get.active.transaction');

	});
	// quản lý thành viên
	Route::group(['prefix' => 'user'], function() {
		Route::get('/','AdminUserController@index')->name('admin.get.list.user');
		Route::get('/create','AdminUserController@create')->name('admin.get.create.user');
		Route::post('/create','AdminUserController@store');
		Route::get('/update/{id}','AdminUserController@edit')-> name('admin.get.edit.user');	
		Route::post('/update/{id}','AdminUserController@update');
		Route::get('/{action}/{id}','AdminUserController@action')-> name('admin.get.action.user');
	});
		// quản lý liên hệ
	Route::group(['prefix' => 'contact'], function() {
		Route::get('/','AdminContactController@index')->name('admin.get.list.contact');
	});
	// quản lý đánh giá
	Route::group(['prefix' => 'rating'], function() {
		Route::get('/','AdminRatingController@index')->name('admin.get.list.rating');
	});
//  test thử phân quyền admin
	Route::prefix("ctv")->group(function() {
// quản lý cộng tác viên
		Route::prefix("admin_ctv")->group(function() {
			Route::get('index',[
				'uses' => 'CTVAdminController@index',
				'middleware'   =>['CheckLoginAdmin']])->name('admin.get.list.ctv');
			Route::get('/create','CTVAdminController@create')->name('admin.get.create.ctv');
			Route::post('/create','CTVAdminController@store');
			Route::get('/update/{id}','CTVAdminController@edit')-> name('admin.get.edit.ctv');	
			Route::post('/update/{id}','CTVAdminController@update');
			Route::get('/{action}/{id}','CTVAdminController@action')-> name('admin.get.action.ctv');
		});

		// roles
		Route::prefix("roles")->group(function() {
			Route::get('/list', 'AdminRolesController@index')->name('admin.get.list.role');
			Route::get('/create','AdminRolesController@create')->name('admin.get.create.role');
			Route::post('/create','AdminRolesController@store');
			Route::get('/update/{id}','AdminRolesController@edit')-> name('admin.get.edit.role');	
			Route::post('/update/{id}','AdminRolesController@update');
			Route::get('/{action}/{id}','AdminRolesController@action')-> name('admin.get.action.role');
		});
		// permission 
		Route::prefix("permissions")->group(function() {
			Route::get('index', 'AdminPermissionsController@index')->name('admin.get.list.permission');
			Route::get('/create','AdminPermissionsController@create')->name('admin.get.create.permission');
			Route::post('/create','AdminPermissionsController@store');
			Route::get('/update/{id}','AdminPermissionsController@edit')-> name('admin.get.edit.permission');	
			Route::post('/update/{id}','AdminPermissionsController@update');
			Route::get('/{action}/{id}','AdminPermissionsController@action')-> name('admin.get.action.permission');
		});

	});
});