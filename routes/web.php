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
    return view('home');
})->name('home');

Route::get('/admin', function () {
    return view('admin/index');
})->name('admin');

Route::get('/admin/newtag', function () {
    return view('admin/newtag');
})->name('newtag');

Route::get('/admin/updatetag/{id}', 'SqlController@updatetag')->name('updatetag');

Route::post('/admin/updatetag-submit/{id}', 'SqlController@updatetagsubmit')->name('unpdatetag-submit');

Route::get('/admin/taglist', function () {
    return view('admin/taglist');
})->name('taglist');

Route::get('/admin/newproject', function () {
    return view('admin/newproject');
})->name('newproject');

Route::get('/admin/tagremove/{id}', 'SqlController@tagremove')->name('tagremove');

Route::post('/admin/newtag/submit', 'SqlController@newtag')->name('newtag-submit');

// Route::post('/submit', 'FormController@submit')->name('form');

Route::post('admin/newprojectupload', 'UploadController@newprojectupload')->name('newprojectupload');
Route::post('admin/updateprojectupload', 'UploadController@updateproject')->name('updateproject');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin/portfolios/{id}', function (){
//     return view('admin/portfolios');
// })->name('admin-portfolios');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/admin/editportfolio', function () {
    return view('admin/editportfolio');
})->name('editportfolio');

Route::get('portfolio/{id}', 'UploadController@getonePortfolio')->name('get-portfolio');

Route::get('/admin/removeportfolio/{id}', 'UploadController@deleteportfolio')->name('deteteportfolio');
Route::get('/admin/editoneproject/{id}', function ($id) {
    return view('admin/editoneproject', ['id'=>$id]);
})->name('editoneproject');

Route::get('admin/changepicture', 'UploadController@changepicture')->name('changepicture');
