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

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ContactFormSubmissionController;
use Spatie\Honeypot\ProtectAgainstSpam;

function checkAuth()
{
    if (count(DB::table('adminpass')->get()) == 0) die();
    if (!Hash::check(Session::get('auth'), DB::table('adminpass')->get()[0]->password)) {
        echo 'нет авторизации!';
        die();
    }
}

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/admin/newtag', function () {
    checkAuth();
    return view('admin/newtag');
})->name('newtag');

Route::get('/admin/updatetag/{id}', 'SqlController@updatetag')->name('updatetag');

Route::post('/admin/updatetag-submit/{id}', 'SqlController@updatetagsubmit')->name('unpdatetag-submit');

Route::get('/admin/taglist', function () {
    checkAuth();
    return view('admin/taglist');
})->name('taglist');

Route::get('/admin/newproject', function () {
    checkAuth();
    return view('admin/newproject');
})->name('newproject');

Route::get('/admin/tagremove/{id}', 'SqlController@tagremove')->name('tagremove');

Route::post('/admin/newtag/submit', 'SqlController@newtag')->name('newtag-submit');

Route::post('/submit', 'AdminpassController@sendMessage')->name('form')->middleware(ProtectAgainstSpam::class);

// Route::get('send-mail', function () {

//     $details = [
//         'title' => 'На сайте оставлена заявка',
//         'body' => 'This is for testing email using smtp'
//     ];

//     \Mail::to('katunin.pavel@gmail.com')->send(new \App\Mail\AdminMail($details));

//     dd("Email is Sent.");
// });

Route::post('admin/newprojectupload', 'UploadController@newprojectupload')->name('newprojectupload');
Route::post('admin/updateprojectupload', 'UploadController@updateproject')->name('updateproject');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/admin/editportfolio', function () {
    checkAuth();
    return view('admin/editportfolio');
})->name('editportfolio');

Route::get('portfolio/{id}', 'UploadController@getonePortfolio')->name('get-portfolio');

Route::get('/admin/removeportfolio/{id}', 'UploadController@deleteportfolio')->name('deteteportfolio');

Route::get('/admin/editoneproject/{id}', function ($id) {
    checkAuth();
    return view('admin/editoneproject', ['id' => $id]);
})->name('editoneproject');

Route::get('admin/changepicture', 'UploadController@changepicture')->name('changepicture');


Route::get('admin', function () {
    $adminpass = DB::table('adminpass')->get();
    if (count($adminpass) > 0) {
        if (Hash::check(Session::get('auth'), $adminpass[0]->password)) return view('admin/index');
        else return view('admin/checkadminpass');
    } else {
        return view('admin/newadminpass', ['update' => false]);
    }
}); //->name('admin');

Route::post('adminSetNewPass', 'AdminpassController@setNewAdminPass')->name('setNewAdminPass');
Route::post('adminCheckPass', 'AdminpassController@checkAdminPass')->name('checkAdminPass');

Route::get('admincheckpass', function () {
    return view('admin/checkadminpass');
})->name('checkadminpass');

Route::get('updateadminpass', function () {
    checkAuth();
    $adminpass = DB::table('adminpass')->get();
    if (Hash::check(Session::get('auth'), $adminpass[0]->password)) return view('admin/newadminpass', ['update' => true]);
    else return redirect('admin');
});

Route::get('/mainpicture', function () {
    checkAuth();
    return view('admin/mainpicture');
})->name('mainpicture');

Route::get('/logout', function () {
    Session::flush('auth');
    return redirect('admin');
});

Route::get('/tutorial', function () {
    // checkAuth(); 
    return view('admin/tutorial');
});

Route::post('updateMainScreenPictures', 'UploadController@updateMainScreenPictures')->name('updateMainScreenPictures');

// старые редиректы
Route::get('/public/ceny', function () {
    return redirect()->to('/');
});
Route::get('/public/map', function () {
    return redirect()->to('/');
});
Route::get('/public/kontakty', function () {
    return redirect()->to('/');
});
Route::get('/public/otzyvy', function () {
    return redirect()->to('/');
});
Route::get('/akcii', function () {
    return redirect()->to('/');
});
Route::get('public/services', function () {
    return redirect()->to('/');
});
Route::get('/public/index/index', function () {
    return redirect()->to('/');
});



