<?php

use App\Helper\ImageFilter;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic;

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

Route::get('/main', function () {
    return view('welcome');
});








Route::get('/', function () {
    return view('pages.homepage');
});

Route::get('/register', function () {
    return view('pages.register');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('login/twitter', 'Auth\LoginController@redirectToProvidertwitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallbacktwitter');




// routes for session

Route::get('/form', function () {
    return view('form');
});

Route::post('/login', 'sessionController@session');


// routes for cookies
Route::get('/setcookie', 'cookiesController@setcookies');
Route::get('/getcookie', 'cookiesController@getcookies');

//Route for uploading file

Route::get('/form', 'fileuploadController@index');

Route::post('/create', 'fileuploadController@create');
Route::get('/show', 'fileuploadController@show');
Route::get('/update/{id}', 'fileuploadController@update');
Route::post('/submit/{id}', 'fileuploadController@imgupdate');


//Route for downloading file
Route::get('/download/{filename}', 'fileuploadController@download');






//Route for image handling

Route::get('/image', function () {
    $img= ImageManagerStatic::make('download.jpg');
    $img->filter(new ImageFilter());

    // $img->fit(400);
    // $img->save('download.png',5);
    return $img->response('png');
    // return view('pages.homepage');
});



//Route for sending email
Route::get('/email','emailsenderController@index');
Route::post('/send','emailsenderController@store');

// Route::get('/emails',function (){
//     $to_name="Roshan Singh";
//     $to_email="singhroshanb1@gmail.com";
//     $data=array('name'=>'anurag','body'=>'test mail');
//     Mail::Send('dynamic_email',$data,function($message) use($to_name,$to_email){
//         $message->to($to_email)->subject('web testing');
//     });
// echo"ok";
    
// });


//Route for pdf creation
Route::get('/pdfform','pdfmakerController@create');
Route::post('submitForm','pdfmakerController@store');
Route::get('/index','pdfmakerController@index');
Route::get('/downloadPDF/{id}','pdfmakerController@downloadPDF');
Route::get('/downloadzip/{id}','pdfmakerController@downloadZip');



//Route for localisation

Route::get('/local/{lang}',function($lang){
    App::setlocale($lang);
    return view('localisation');
});









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/////////Route for creating XLS files\\\\\\\\\\\\\\\

Route::get('/export_excel', 'ExportExcelController@index');
Route::get('/export', 'ExportController@export');

// Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');




