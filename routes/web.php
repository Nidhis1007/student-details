<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAccessController;
use App\Http\Controllers\StudentController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/',[LoginAccessController::class,'home'])->name('login');


Route::prefix('register')->group(function(){
    Route::post('/createuser',[LoginAccessController::class,'authenticateUser']);
    Route::post('/userlogin',[LoginAccessController::class,'userlogin']);
});
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard', [StudentController::class,'dashboard']);
});
Route::post('/addstudents',[LoginAccessController::class,'registerform']);
Route::post('/registerstudent',[LoginAccessController::class,'registerstudent']);
Route::post('/updatestudent',[LoginAccessController::class,'updatestudent']);
Route::get('/viewstudentlist',[LoginAccessController::class,'viewstudentlist']);
Route::get('/logout',[LoginAccessController::class,'logout']);
Route::get('/update/{id}',[LoginAccessController::class,'update']);
Route::get('/delete/{id}',[LoginAccessController::class,'delete']);


Route::get('/index',[LoginAccessController::class,'home']);





