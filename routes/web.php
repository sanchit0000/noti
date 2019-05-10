<?php
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Notifications\AddCar;
 
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('notify',function(){
   $user=User::all();
   $letter=collect(['title'=>'New car added','body'=>'car']);
   Notification::send($user,new AddCar($letter));
});