<?php

namespace App\Http\Controllers;

use App\Services\LessonService;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function __construct(LessonService $lessonService)
    {
        parent::__construct();
        $this->lessonService = $lessonService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->all();
        $lessons = $this->lessonService->getLessons($param);

        return view('lessons.index', compact('lessons','param'));
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentIndex()
    {
        return view('lessons.student_index');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        $this->lessonService->store($param);

        return response()->json([
            'status' => 200,
        ], 200);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $isReserved = $this->lessonService->isReserved($lesson);
        $teacher = $this->lessonService->getTeacherByTeacherId($lesson['teacher_id']);
        
        return view('lessons.show', compact('lesson', 'teacher', 'isReserved'));
    }

    public function cancel(Request $request) 
    {
        $param = $request->all();
        $this->lessonService->cancel($param);
        return response()->json([
            'status' => 200,
        ], 200);
    }

    public function getSchedules() 
    {
        return [
            [
                'title' => 'ヨガレッスン2',
                'teacher' => 'MASUMI KUWATA',
                'description' => 'ヨガのレッスンをします。ハードですがついてきてください。大変な時もありますが頑張りましょう。',
                'profile' => 'Yoga teacher in JAPAN',
                'start' => '2022-10-16',
                'end'   => '2022-10-16',
            ],
            [
                'title' => 'シルバーウィーク旅行',
                'teacher' => '桑田真澄',
                'description' => '人気の旅館の予約が取れた',
                'start' => '2022-10-17 10:00:00',
                'end'   => '2022-10-17 18:00:00',
                'url'   => 'https://admin.juno-blog.site',
            ],
            [
                'title' => '給料日',
                'teacher' => '桑田真澄',
                'description' => '',
                'start' => '2022-10-18',
                'color' => '#ff44cc',
            ],
        ];
    }
}
