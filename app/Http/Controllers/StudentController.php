<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('students.index');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $userStudent = $this->studentService->getUserStudent();
        return view('students.edit', compact('userStudent'));
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student, User $user)
    {
        $result = $this->studentService->saveUserStudent($request, $student, $user);
        if ($result) {
            $flash = ['success' => 'データを更新しました。'];
        } else {
            $flash = ['error' => 'データの更新に失敗しました。'];
        }
        $userStudent = $this->studentService->getUserStudent();

        return redirect()
            ->route('student.edit', $userStudent)
            ->with($flash);
    }


}
