<?php

use App\Events\UserSignedUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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

Route::get('/', function (Request $request) {

    event(new UserSignedUp($request->input('name')));

    return view('welcome');
});
