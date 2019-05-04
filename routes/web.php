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



Auth::routes(['verify' => false, 'register' => false]);

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/admin', 'HomeController@index')->name('admin')->middleware('auth');
Route::resource('/admin/pages', 'PagesController')->middleware('auth');
Route::resource('/admin/orders', 'OrdersController')->middleware('auth');
Route::resource('/admin/newsletter', 'NewsletterController')->middleware('auth');
Route::resource('/admin/settings', 'SettingsController')->middleware('auth');
Route::resource('/admin/slider', 'SliderController')->middleware('auth');
Route::resource('/admin/images/groups', 'ImagesGroupsController')->middleware('auth');
Route::resource('/admin/gallery', 'GalleriesController')->middleware('auth');
Route::resource('/admin/attributes_groups', 'AttributesGroupsController')->middleware('auth');
Route::resource('/admin/attributes_groups/attributes', 'AttributesController')->middleware('auth');
Route::resource('/admin/combinations', 'CombinationsController')->middleware('auth');

Route::resource('/admin/combinations/{id_combination}/price_rule', 'PriceRulesController')->middleware('auth');

Route::get('/install', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    // Artisan::call('migrate --seed');
    // Artisan::call('storage:link');
});


Route::get('{path}', function () {
    return view('front.app');
})->where('path', '.*');


