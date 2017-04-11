<?php




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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['namespace' => 'Api'], function () {
    Route::get('/purchases', 'ApiController@index');
    Route::post('/purchases', 'ApiController@create');
});
