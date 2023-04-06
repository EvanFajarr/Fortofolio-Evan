<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LoginController;
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

Route::group(['middleware'=> 'admin'],function () {
Route::resource('/skill', SkillController::class);
Route::resource('/project', ProjectController::class);
Route::resource('/About', AboutController::class);
Route::resource('/Experience', ExperienceController::class);
Route::resource('/education', educationController::class);
});




 Route::get('/', function () {
         return view('home.index');
 });

 Route::get('/aboutMe', function () {
        return view('AboutMe.index');
});

 


Route::group(['middleware'=> 'guest'],function () {
 Route::get('/loginEvan',[LoginController::class,'index']);
Route::post('/loginEvan',[LoginController::class,'loginEvan']);
});
Route::get('/login/logout',[LoginController::class,'logout']);


Route::get('/',[educationController::class,'tampil']);

Route::get('/',[educationController::class,'tampil']);

// Route::get('/',[ExperienceController::class,'pp']);


Route::get('/tampilProject',[ProjectController::class,'project']);