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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/demo','fontendController@getData')->name('data');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('can:example');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/news', function (){
	return view('fontend.master');
});
Route::get('/add-news','HomeController@addNews')->name('add-news');
Route::post('/addAction','HomeController@addAction')->name('addAction');
Route::post('/addUser','HomeController@addUser')->name('addUser');
Route::post('/deleteUser', 'HomeController@deleteUser')->name('deleteUser');
Route::post('/getInfo','HomeController@getInfo')->name('getInfo');
Route::post('/saveUser','HomeController@saveUser')->name('saveUser');
Route::get('/list-news', 'HomeController@listNews')->name('list-news');

Route::get('/getPost/{slug}', 'HomeController@getPost')->name('getPost');
Route::post('/savePost','HomeController@savePost')->name('savePost');

Route::get('product','ExampleController@index');
Route::post('getInforById','ExampleController@getInforById');
Route::post('editPost','ExampleController@editPost');
Route::post('deletePost','ExampleController@deletePost');
Route::post('addAb','ExampleController@addAb');
Route::post('getInfoDelete','ExampleController@getInfoDelete');
Route::post('viewPost','ExampleController@viewPost');

Route::get('/news', 'fontendController@index');
Route::get('/getNews/{id}', 'fontendController@getNews');
Route::get('admin/profile', 'UserController@addProduct')->name('addProduct')->middleware('LoginUser');
Route::get('/hoc/{thamso1}/{thamso2}', function ($ts1,$ts2){
	return 'Tham số truyền vào là: '.$ts1." và".$ts2;
})->where(['ts1'=>'a-zA-Z+','ts2'=>'[0-9]+']);
Route::get('/testmail','ExampleController@getTestMail');
Route::post('/testmail','ExampleController@postTextMail')->name('postTest');

Route::get('/test01', function (){
	return view('valen');
});
Route::get('/checklogin','ExampleController@getcheck');

Route::post('/request-reset-pass','Auth\ResetPasswordController@sendinfo')->name('resetpass');
Route::get('/reset-pass/{token}','Auth\ResetPasswordController@resetpass');
Route::post('/reset-pass/{token}','Auth\ResetPasswordController@checkdata')->name('checkdata');