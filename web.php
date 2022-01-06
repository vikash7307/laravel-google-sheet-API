<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetsController;

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

//Route::get("list",[GoogleSheetsController::class,'sheetOperation']);
Route::get('googlesheetsapi', [GoogleSheetsController::class,'GetSheetData']);
Route::get('google', [GoogleSheetsController::class,'getClient']);
Route::get('list', [GoogleSheetsController::class, 'GetSheetData']);


Route::get('insert', [GoogleSheetsController::class, 'index']);
Route::post('insertIntoSheet', [GoogleSheetsController::class, 'insertIntoSheet']);

Route::post('append', [GoogleSheetsController::class, 'appendSheet']);


