<?php

namespace App\Repositories\Lesson;

use App\Models\Lesson;
use Carbon\CarbonImmutable as Carbon; 

class LessonRepository implements LessonRepositoryInterface
{   
    public function getLessons($param)
    {
        $carbon = new Carbon();

        $query = Lesson::with('categories')
            ->Join('teachers', 'lessons.teacher_id', '=', 'teachers.id','right outer')
            ->select('lessons.id as id', 'lesson_name', 'start_date', 'start_time', 'first_name', 'content', 'last_name', 'age', 'sex','lessons.created_at as created_at')
            ->where('is_approval', true);
        if (!$param) {
            // TODO:過去レッスンの扱いはどうするのか相談しないとまずい
            $query->whereBetween('start_date', [$carbon->now()->startOfMonth()->toDateString(), $carbon->now()->endOfMonth()->toDateString()]);
        } else {
            if (isset($param['lesson_name'])) {
                $query->where('lesson_name', 'LIKE', "%{$param['lesson_name']}%");
            }
            if (isset($param['teacher_name'])) {
                $query->where('first_name', 'LIKE', "%{$param['teacher_name']}%")
                    ->orWhere('last_name', 'LIKE', "%{$param['teacher_name']}%");
            }
            if (isset($param['start_date'])) {
                $query->where('start_date', '=', $param['start_date']);
            }
            if (isset($param['categories'])) {
                $query->whereHas('categories', function($query) use($param) {
                    $query->whereIn('categories.id', $param['categories']);
                    // foreach ($param['categories'] as $value) {
                    //     $query->where('categories.id', '=', $value);
                    // } 
                });
            }
        }

        $result = $query->paginate(9);

        return $result;
    }

    public function getLessonByLessonId($lessonId)
    {
        $result = Lesson::with('teachers')
        ->where([
            ['id', '=', $lessonId],
            ['is_finish', '=', 0]
        ])
        ->first();

        return $result;
    }

    public function createUserStudent($param)
    {
        $lesson = Lesson::where('id', '=', $param['lesson_id'])->first();
        $lesson->students()->attach($param['student_id']);
    }

    public function cancel($param)
    {
        $lesson = Lesson::where('id', '=', $param['lesson_id'])->first();
        $lesson->students()->detach($param['student_id']);
    }
}