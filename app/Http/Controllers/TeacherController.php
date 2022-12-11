<?php

namespace App\Http\Controllers;

use App\Services\TeacherService;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    private $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if ($user->user_type !== config('const.USER_TYPE.teacher')) {
                abort(500);
            }
            return $next($request);
        });
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('teachers.index');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $userTeacher = $this->teacherService->getUserTeacher();

        return view('teachers.edit', compact('userTeacher'));
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $result = $this->teacherService->updateUserTeacher($request, $teacher);
        if ($result) {
            $flash = ['success' => 'データを更新しました。'];
        } else {
            $flash = ['error' => 'データの更新に失敗しました。'];
        }

        return redirect()
            ->route('teacher.edit', ['id' => Auth::id()])
            ->with($flash);
    }

}