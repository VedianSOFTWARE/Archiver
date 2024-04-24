<?php

use Illuminate\Support\Facades\Route;
use Vedian\Cms\Controllers\PageController;
use Vedian\Cms\Controllers\RowController;
use Vedian\Cms\Controllers\ColumnController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => config('vedian.middleware', ['web'])], function () {
    // public available routes
});
