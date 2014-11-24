<?php


#Route::controller('files', 'FilesController');

Route::get('files/list', ['as'=>'files.list', 'uses'=>'FilesController@getListarfiles']);
Route::get('files/list', ['as'=>'files.list', 'uses'=>'FilesController@postReplaceFiles']);
Route::get('files/simple', ['as'=>'files.simple', 'uses'=>'FilesController@getSimple']);
Route::post('files/simple', ['as'=>'files.simple', 'uses'=>'FilesController@postSimple']);
Route::get('files/content', ['as'=>'files.content', 'uses'=>'FilesController@content']);
# CSRF Protection
Route::when('*', 'csrf', ['POST', 'PUT', 'PATCH', 'DELETE']);

# Static Pages. Redirecting admin so admin cannot access these pages.
Route::group(['before' => 'redirectAdmin'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
	Route::get('/about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
	Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
});

# Registration
Route::group(['before' => 'guest'], function()
{
	Route::get('/register', 'RegistrationController@create');
	Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
});

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Forgotten Password
Route::group(['before' => 'guest'], function()
{
	Route::get('forgot_password', 'RemindersController@getRemind');
	Route::post('forgot_password','RemindersController@postRemind');
	Route::get('reset_password/{token}', 'RemindersController@getReset');
	Route::post('reset_password/{token}', 'RemindersController@postReset');
});


# Standard User Routes
Route::group(['before' => 'auth|standardUser'], function()
{
	Route::get('userProtected', 'StandardUserController@getUserProtected');
	Route::resource('profiles', 'UsersController', ['only' => ['show', 'edit', 'update']]);
	Route::get('standardUser/files/list', ['as'=>'files.list', 'uses'=>'FilesController@getListarfiles']);
	//Route::get('files/list', ['as'=>'files.list', 'uses'=>'FilesController@postReplaceFiles']);
	Route::get('standardUser/files/simple', ['as'=>'files.simple', 'uses'=>'FilesController@getSimple']);
	Route::post('standardUser/files/simple', ['as'=>'files.simple', 'uses'=>'FilesController@postSimple']);

});

# Admin Routes
Route::group(['before' => 'auth|admin'], function()
{
	Route::get('/admin', ['as' => 'admin_dashboard', 'uses' => 'AdminController@getHome']);
    Route::resource('admin/profiles', 'AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    //Route::resource('admin/files', 'AdminController',['only' => ['index', 'upload', 'files_db']]);
    Route::get('admin/files/list', ['as'=>'files.list', 'uses'=>'FilesController@getListarfiles']);
		//Route::get('files/list', ['as'=>'files.list', 'uses'=>'FilesController@postReplaceFiles']);
		Route::get('admin/files/simple', ['as'=>'files.simple', 'uses'=>'FilesController@getSimple']);
		Route::post('admin/files/simple', ['as'=>'files.simple', 'uses'=>'FilesController@postSimple']);
});




