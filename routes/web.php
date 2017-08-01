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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('role',function()
{
    $admin = new App\Models\Role();
    $admin->name         = 'admin';
    $admin->display_name = 'User Administrator'; // optional
    $admin->description  = 'User is allowed to manage and edit other users'; // optional
    $admin->save();

    $user = new App\Models\Role();
    $user->name         = 'user';
    $user->display_name = 'User '; // optional
    $user->description  = 'User is allowed to manage  users'; // optional
    $user->save();
    
});

Route::get('/notify-sms', 'NotifyController@notifySms');
Route::get('/notify-mail', 'NotifyController@notifyMail');

Route::get('/insert-users',function()
{
    factory(App\Models\User::class, 5)->create();

});

Route::get('/cache-users', 'CacheController@getUsers');

Route::get('/trigger-event','EventController@triggerEvent');