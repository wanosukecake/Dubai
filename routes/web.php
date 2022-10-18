<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;

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
});

// 認証と初期情報チェックが必要なルーティングは以下
Route::middleware(['auth','initial_check'])->group(function () {
    Route::get('/schedule/student-index', [ScheduleController::class, 'studentIndex'])->name('schedule.studentIndex');
    Route::get('/schedule/get-schedules', [ScheduleController::class, 'getSchedules']);
    Route::post('/schedule/save-student-schedule', [ScheduleController::class, 'saveStudentSchedule']);
    Route::resource('schedule', 'ScheduleController');
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
