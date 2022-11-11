<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\C_CourseController;
use App\Http\Controllers\CaptionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Lesson_AttachmentContoller;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ApiController;

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

Route::get('/lessons', [LessonController::class,'index']);
Route::Resource('/lessons', LessonController::class);


Route::get('/course', [C_CourseController::class,'index']);
Route::get('/course/create', [C_CourseController::class,'create']);
Route::post('/course', [C_CourseController::class,'store']);
Route::get('/course/{id}', [C_CourseController::class,'show']);
Route::put('/course/{id}', [C_CourseController::class,'update']);
Route::delete('/course/{id}', [C_CourseController::class,'destroy']);


Route::get('/api_course', [ApiController::class,'course']);
Route::get('/api_lessons_attachments', [ApiController::class,'l_lessons_attachments']);


// Route::get('/website', [IndexController::class,'index']);

Route::Resource('/lesson_attachment', Lesson_AttachmentContoller::class);

Route::get('/captions/get', [CaptionController::class,'index']);
Route::put('/captions/get/{id}', [CaptionController::class,'update']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

//payment->payement_export
Route::get('/transcrip_export', [App\Http\Controllers\Report\TranscriptPDFController::class, 'export']);
