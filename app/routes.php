<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/', array('as' => 'dashboard.post', 'uses' => 'PostController@index'));

// article
Route::get('/blog', array('as' => 'dashboard.post', 'uses' => 'PostController@index'));
Route::get('/blog/{id}/{slug?}', array('as' => 'dashboard.post.show', 'uses' => 'PostController@show'));

Route::get('/article', array('as' => 'dashboard.article', 'uses' => 'ArticleController@index'));
Route::get('/article/{id}/{slug?}', array('as' => 'dashboard.article.show', 'uses' => 'ArticleController@show'));


// tags
Route::get('/tag/{tag}', array('as' => 'dashboard.tag', 'uses' => 'TagController@index'));
Route::get('/about', array('as' => 'dashboard.about', 'uses' => 'AboutController@index'));


// categories
Route::get('/category/{category}', array('as' => 'dashboard.category', 'uses' => 'CategoryController@index'));
Route::get('/ders/{ders}', array('as' => 'dashboard.ders', 'uses' => 'DersController@index'));



// photo gallery

// contact
Route::get('/contact', array('as' => 'dashboard.contact', 'uses' => 'FormPostController@getContact'));
Route::post('/contact', array('as' => 'dashboard.contact.post', 'uses' => 'FormPostController@postContact'), array('before' => 'csrf'));

Route::group(array('prefix' => 'admin', 'namespace' => 'App\Controllers\Admin', 'before' => 'auth.admin'), function () {

    // admin dashboard
    Route::get('/', array('as' => 'admin.dashboard', function () {

        return View::make('backend/_layout/dashboard');
    }));
    //->with('active', 'home')

    // user
    Route::resource('user', 'UserController');
    Route::get('user/{id}/delete', array('as' => 'admin.user.delete', 'uses' => 'UserController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // blog
    Route::resource('post', 'PostController');
    Route::get('post/{id}/delete', array('as' => 'admin.post.delete', 'uses' => 'PostController@confirmDestroy'))
        ->where('id', '\d+');

    //article
    Route::resource('article', 'ArticleController');
    Route::get('article/{id}/delete', array('as' => 'admin.article.delete', 'uses' => 'ArticleController@confirmDestroy'))
        ->where('id', '\d+');

    // news

    // category
    Route::resource('category', 'CategoryController');
    Route::get('category/{id}/delete', array('as' => 'admin.category.delete', 'uses' => 'CategoryController@confirmDestroy'))
        ->where('id', '[0-9]+');
    // category
    Route::resource('ders', 'DersController');
    Route::get('ders/{id}/delete', array('as' => 'admin.ders.delete', 'uses' => 'DersController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // page

    // photo gallery

    // ajax - blog
    Route::post('post/{id}/toggle-publish', array('as' => 'admin.post.toggle-publish', 'uses' => 'PostController@togglePublish'))
        ->where('id', '[0-9]+');

    // ajax - news

    // ajax - photo gallery

    // ajax - page
    // ajax - form post
    Route::post('form-post/{id}/toggle-answer', array('as' => 'admin.form-post.toggle-answer', 'uses' => 'FormPostController@toggleAnswer'))
        ->where('id', '[0-9]+');

    // file upload photo gallery
    // settings
    Route::get('/settings', array('as' => 'admin.settings', 'uses' => 'SettingController@index'));
    Route::post('/settings', array('as' => 'admin.settings.save', 'uses' => 'SettingController@save'), array('before' => 'csrf'));

    //about
    Route::get('/about', array('as' => 'admin.about', 'uses' => 'AboutController@index'));
    Route::post('/about', array('as' => 'admin.about.save', 'uses' => 'AboutController@save'), array('before' => 'csrf'));
    // form post
    Route::resource('form-post', 'FormPostController', array('only' => array('index', 'show', 'destroy')));
    Route::get('form-post/{id}/delete', array('as' => 'admin.form-post.delete', 'uses' => 'FormPostController@confirmDestroy'))
        ->where('id', '[0-9]+');

    // slider


    // slider

    // file upload slider

    // menu-managment

});

// filemanager
Route::get('filemanager/show', function () {

    return View::make('backend/plugins/filemanager');
})->before('auth.admin');

// login
Route::get('/admin/login', array('as' => 'admin.login', function () {

    return View::make('backend/auth/login');
}));

Route::group(array('namespace' => 'App\Controllers\Admin'), function () {

    // admin auth
    Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));
    Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'AuthController@getLogin'));
    Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'AuthController@postLogin'));

    // admin password reminder
    Route::get('admin/forgot-password', array('as' => 'admin.forgot.password', 'uses' => 'AuthController@getForgotPassword'));
    Route::post('admin/forgot-password', array('as' => 'admin.forgot.password.post', 'uses' => 'AuthController@postForgotPassword'));

    Route::get('admin/{id}/reset/{code}', array('as' => 'admin.reset.password', 'uses' => 'AuthController@getResetPassword'))
        ->where('id', '[0-9]+');
    Route::post('admin/reset-password', array('as' => 'admin.reset.password.post', 'uses' => 'AuthController@postResetPassword'));
});

/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/

// error
App::error(function (Exception $exception) {

    Log::error($exception);
    $error = $exception->getMessage();
    return Response::view('errors.error', compact('error'));
});

// 404 page not found
App::missing(function () {

    return Response::view('errors.missing', array(), 404);
});
