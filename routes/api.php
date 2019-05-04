<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/order/new', 'OrdersController@store');
Route::post('/order/image', 'OrdersController@storeImage');
Route::delete('/order/image', 'OrdersController@destroyImage');
Route::get('/order/{token}', 'OrdersController@getOrderByToken');

Route::get('/pages', 'PagesController@getPages');
Route::get('/slides', 'SliderController@getSlides');
Route::get('/groups', 'ImagesGroupsController@getGroups');
Route::get('/options', function() {
    return App\AttributesGroup::with('attributes')->get();
});

Route::get('/combinations', 'CombinationsController@getCombinations');



Route::get('/page/{id}', 'PagesController@getPage');