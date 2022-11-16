<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/t-shirt', \App\Http\Controllers\TShirtController::class);

Route::put('/merge/{t_shirt}', [\App\Http\Controllers\TShirtController::class, 'displayMergedImage'])->name('mergedImage');

Route::get('/merge/getRenderer/{t_shirt}/{userDesign?}', \App\Http\Controllers\MergeController::class)->name('imageRenderer');
