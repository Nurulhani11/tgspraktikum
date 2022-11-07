<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    return 'Hello World';
});

Route::get('/test2', function(){
    return 'Hello World Hello World Hello World Hello World';
});

Route::redirect('/test', '/test2');
Route::view('/greeting', 'greeting');

Route::view('/greeting', 'greeting', ['name' => 'Febry']);

Route::get('/user/{id}', function($id){
    return "User" .$id;
});

Route::get('/user/{id}/{nama}/{alamat}', function($id, $nama, $alamat){
    $text = "User id = ".$id.", Nama= ".$nama.", Alamat= ".$alamat;
    return $text;
});

Route::get('/user/{name?}', function($name = null){
    return "Hai".$name;
});

Route::get('/user/{name?}', function($name = 'Jhon Doe'){
    return "Hai".$name;
});

Route::get('/user/{name}', function($name){
    return 'Hai'.$name.' !';
})->where('name', '[A-Za-z]+');

Route::get('/user_id/{id}', function($id){
    return 'User id anda adalah '.$id;
})->where('id', '[0-9]+');

Route::get('/user_akun/{id}/{name}', function($id, $name){
    return 'Hai'.$name.' User id anda adalah '.$id;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

Route::get('/greeting', function(){
    return view('greeting');
});

Route::get('/user/profile', function(){
    return "Hello Febry";
})->name('profile');

Route::get('/user/{name}', 'UserController@show');
Route::get('foo', 'Photos\AdminController@method');


Route::get('/', function (){
    return view('greetng', ['name' => 'James']);
});

Route::get('/', function (){
    return view('admin.profile', $data);
});
Auth::routes();
Route::get('profile', function(){
   //Hanya pengguna yang telah terotentikasi yang dalam mengakses rute ini 
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index'])
->name('admin.home')
->middleware('is_admin');
