<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LessonController;
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
    Route::put('teacher.update', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('/manager/add', [ManagerController::class, 'add'])->name('manager.add');
    Route::post('/manager/store', [ManagerController::class, 'store'])->name('manager.store');
});

// 認証と初期情報チェックが必要なルーティングは以下
Route::middleware(['auth','initial_check'])->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/add', [ScheduleController::class, 'add'])->name('schedule.add');
    Route::post('/schedule/update', [ScheduleController::class, 'update']);
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/add', [TeacherController::class, 'add'])->name('teacher.add');
    Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::get('/lesson/student-index', [LessonController::class, 'studentIndex'])->name('lesson.studentIndex');
    Route::get('/lesson/get-schedules', [LessonController::class, 'getSchedules']);
    Route::post('/lesson/cancel', [LessonController::class, 'cancel']);
    Route::resource('lesson', 'LessonController');
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/add', [StudentController::class, 'add'])->name('student.add');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
