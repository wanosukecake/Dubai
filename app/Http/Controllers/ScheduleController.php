<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;
use App\Services\TeacherService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private $scheduleService;

    public function __construct(ScheduleService $scheduleService, TeacherService $teacherService)
    {
        $this->scheduleService = $scheduleService;
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
    public function index()
    {
        return view('schedules.index');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $userTeacher = $this->teacherService->getUserTeacher();
        return view('schedules.add', compact('userTeacher'));
    }

    public function getSchedules(Request $request)
    {
        $teacher = $this->teacherService->getTeacher();
        $schedules = $this->scheduleService->getSchedules($request, $teacher);
        return $schedules;
    }

    public function update(Request $request)
    {
        $userTeacher = $this->teacherService->getUserTeacher();
        $result = $this->scheduleService->createSchedule($request, $userTeacher);

        return response()->json([
            'status' => 200,
        ], 200);
    }
}
