<?php

use App\Destination;
use App\Trip;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/test', function () {
//     return 'test';
// });

//Trips
//index
Route::get('/', function () {
  $trips = Trip::orderBy('created_at', 'asc')->get();
  return view('trips', [
    'trips' => $trips
  ]);
});

//post
Route::get('/trips', 'SearchController@filter');

//delete
Route::post('/trip/{trip}', function (Trip $trip) {
    //
});
