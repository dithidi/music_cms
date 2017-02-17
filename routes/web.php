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

Route::get('/', 'SiteController@index');

Route::group(['prefix' => 'admin'], function () {
    // Authentication Routes...
    $this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('/login', 'Auth\LoginController@login');
    $this->post('/logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('/register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    $this->post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');

    // ADMIN ARTICLES
    Route::get('/articles', 'ArticleController@adminGetArticles');
    Route::get('/articles/{id}', 'ArticleController@adminGetArticle');
    Route::post('/articles/{id}', 'ArticleController@adminUpdateArticle');
    Route::post('/articles/', 'ArticleController@adminCreateArticle');

    // ADMIN SOCIALS
    Route::get('/socials', 'SocialController@adminGetSocials');
    Route::post('/socials/{id}', 'SocialController@adminUpdateSocial');
});
