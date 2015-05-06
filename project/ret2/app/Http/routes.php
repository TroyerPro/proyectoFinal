<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::pattern('id', '[0-9]+');
Route::get('news/{id}', 'ArticlesController@show');
Route::get('video/{id}', 'VideoController@show');
Route::get('photo/{id}', 'PhotoController@show');
Route::get('subasta/view/{id}', 'Subasta\View@show'); //Hecho //Cambiar para poner id en la URL!!! <----
Route::get('search','Search@show');
Route::get('perfil/view/{id}','ProfileUser@show'); //ID

//######################################################################
//                         Test Adri
//######################################################################
Route::get('testbd/{id}','Testbd@show');
//######################################################################


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

if (Request::is('admin/*'))
{
    require __DIR__.'/admin_routes.php';
}

if (Request::is('user/*'))
{
    require __DIR__.'/user_routes.php';
}