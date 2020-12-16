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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'CalendarController@show')->name("calendar");

Route::get('/calendar2', function(){
	return view('calendar_blade',[
		"time" => new \Carbon\Carbon(strtotime($_GET["date"])),
		"schedule" => [
			"20201122" => "いい夫婦の日でした！",
			"20201123" => "勤労感謝の日",
		]
	]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//祝日設定
Route::get('/holiday_setting', 'Calendar\HolidaySettingController@form')->name("holiday_setting");
Route::post('/holiday_setting', 'Calendar\HolidaySettingController@update')->name("update_holiday_setting");

//臨時営業設定
Route::get('/extra_holiday_setting', 'Calendar\ExtraHolidaySettingController@form')->name("extra_holiday_setting");
Route::post('/extra_holiday_setting', 'Calendar\ExtraHolidaySettingController@update')->name("update_extra_holiday_setting");