<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LessonController;

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

// 認証のみ必要なルーティングは以下
Route::middleware(['auth'])->group(function () {
    Route::put('student.update', [StudentController::class, 'update'])->name('student.update');
    Route::get('/manager/add', [ManagerController::class, 'add'])->name('manager.add');
    Route::post('/manager/store', [ManagerController::class, 'store'])->name('manager.store');
});

// 認証と初期情報チェックが必要なルーティングは以下
Route::middleware(['auth','initial_check'])->group(function () {
    Route::post('/schedule/save-student-schedule', [ScheduleController::class, 'saveStudentSchedule']);
    Route::resource('schedule', 'ScheduleController');
    Route::get('/lesson/student-index', [LessonController::class, 'studentIndex'])->name('lesson.studentIndex');
    Route::get('/lesson/get-schedules', [LessonController::class, 'getSchedules']);
    Route::resource('lesson', 'LessonController');
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
