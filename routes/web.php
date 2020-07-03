<?php

use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;
// use App\http\Controllers\Auth;
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

Route::get('/login', function () {
    return view('auth.login');
});

// Route::get('/','TestController@index');

// Route::get('/contact','ContactController@index');
//หน้าแรกสำหรับเข้าสู่ Controller

Auth::routes();
Route::resource('/', 'CondoController');
// สำหรับเข้า services
Route::resource('/services', 'ServiceController');
// สำหรับ Building
Route::resource('/buildings', 'BuildingController');
// นิติบุคคล
Route::resource('/juristics', 'JuristicController');
// พนักงาน
Route::resource('/users', 'UserController');
// ห้องพัก
Route::resource('/rooms', 'RoomController');
// ลูกค้า
Route::resource('/customers','CustomerController');
// contact
Route::resource('/contacts', 'ContactController');
Route::resource('/ctt', 'ContactTypeController');
// contact data
Route::resource('/datact', 'ContactDataController');
// Add payment
Route::resource('/payment', 'PaymentController');
// request payment
Route::get('/payment-sent','PaymentController@payment');
// ! ตัวอย่างการใช้ controller นอกเหนือจาก resource
// Route::get('/article-count', 'ArticleController@countArticle');

// Water
Route::resource('/water', 'WaterController');
Route::get('/water-check', 'WaterController@watercheck');
// Bill
Route::resource('/bill', 'BillController');
Route::get('/bill-sent','BillController@billsent');

// Billmake
Route::resource('/billmake','BillmakeController');

// report
Route::resource('/report', 'ReportController');
Route::get('/report-sent','ReportController@reportsent');

// reportnopay
Route::resource('/reportnopay', 'ReportNoPayController');

// maintainnance
Route::resource('/reportmtn', 'ReportmtnController');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login','Auth\LoginController@index');
