
<?php
use Illuminate\Support\Facades\Route;
################### Route Dashboard admin ##########################

Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function (){
    Route::get('/' , 'DashboardController@index')->name('admin.dashboard');
    Route::get('destroy/{id}', 'DashboardController@destroy')->name('admin.dashboard.destroy');

    Route::any('logout', 'LoginController@logout')->name('admin.logout');
################### Route admin ##########################
    Route::group(['prefix' => 'administers'], function (){
        Route::get('/' , 'AdminController@index')->name('admin.admins');
        Route::get('create', 'AdminController@create')->name('admin.admins.create');
        Route::post('create', 'AdminController@store')->name('admin.admins.store');
        Route::get('edit/{id}', 'AdminController@edit')->name('admin.admins.edit');
        Route::post('update/{id}', 'AdminController@update')->name('admin.admins.update');
        Route::get('destroy/{id}', 'AdminController@destroy')->name('admin.admins.destroy');

    });
################### Route lounges ##########################
    Route::group(['prefix' => 'lounges'], function (){
        Route::get('/' , 'LoungesController@index')->name('admin.lounges');
        Route::get('create', 'LoungesController@create')->name('admin.lounges.create');
        Route::post('create', 'LoungesController@store')->name('admin.lounges.store');
        Route::get('edit/{id}', 'LoungesController@edit')->name('admin.lounges.edit');
        Route::post('update/{id}', 'LoungesController@update')->name('admin.lounges.update');
        Route::get('destroy/{id}', 'LoungesController@destroy')->name('admin.lounges.destroy');

    });
    ################### Route moviesImage ##########################
    Route::group(['prefix' => 'movies'], function (){
        Route::get('/' , 'MoviesController@index')->name('admin.movies');
        Route::get('create', 'MoviesController@create')->name('admin.movies.create');
        Route::post('create', 'MoviesController@store')->name('admin.movies.store');
        Route::get('edit/{id}', 'MoviesController@edit')->name('admin.movies.edit');
        Route::post('update/{id}', 'MoviesController@update')->name('admin.movies.update');
        Route::get('destroy/{id}', 'MoviesController@destroy')->name('admin.movies.destroy');
        Route::get('status/{id}', 'MoviesController@status')->name('admin.movies.status');
    });
    ################### Route tiems ##########################
    Route::group(['prefix' => 'times'], function (){
        Route::get('/' , 'ItemMoviesController@index')->name('admin.times');
        Route::get('create', 'ItemMoviesController@create')->name('admin.times.create');
        Route::post('create', 'ItemMoviesController@store')->name('admin.times.store');
        Route::get('edit/{id}', 'ItemMoviesController@edit')->name('admin.times.edit');
        Route::post('update/{id}', 'ItemMoviesController@update')->name('admin.times.update');
        Route::get('destroy/{id}', 'ItemMoviesController@destroy')->name('admin.times.destroy');
        Route::get('status/{id}', 'ItemMoviesController@status')->name('admin.times.status');
    });
});


################### Route login admin ##########################
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function (){
   Route::get('login', 'LoginController@getlogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});
