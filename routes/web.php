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
Route::get('/', 'WelcomeController@index');

Route::get('users', 'UsersController@create');
Route::post('users', 'UsersController@store');

// Route::get('contact', 'ContactController@create');
// Route::post('contact', 'ContactController@store');

Route::middleware('verified')->group(function() {

  Route::get('contact', 'ContactsController@create')->name('contact.create');
  Route::post('contact', 'ContactsController@store')->name('contact.store');

});

Route::get('articles/{n}', function($n) {
  return view('article')->withNumero($n);
})->where('n', '[0-9]+');

Route::get('/test-contact', function () {
    return new App\Mail\Contact([
      'nom' => 'Durand',
      'email' => 'ulys.chambard@le-campus-numerique.fr',
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);
})->middleware('verified');

Route::get('photo', 'PhotoController@create');
Route::post('photo', 'PhotoController@store');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('films', 'FilmController');
