<?php

namespace App\Repositories\Schedule;

use Illuminate\Support\Facades\DB;
use App\Models\Lesson;

class ScheduleRepository implements ScheduleRepositoryInterface
{   
    public function createSchedule($scheduleData)
    {
        DB::beginTransaction();
        try {
            Lesson::create($scheduleData);

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          info($e->getMessage());

          return false;
        }

        return true;
    }

    public function getSchedules(array $conditions): array
    {
        $teacherId = $conditions['teacher_id'];
        $startDate = $conditions['start_date'];
        $endDate = $conditions['end_date'];

        $scheduleArray = Lesson::whereTeacherId($teacherId)
            ->select(
                'lesson_name as title',
                'start_date as start',
                'start_date as end',
                'start_time as start_time',
                'content as content',
                'is_approval as is_approval',
                'is_finish as is_finish',
            )
            ->where('start_date', '>=', $startDate)
            ->where('start_date', '<=', $endDate)
            ->get()
            ->toArray();

        return $scheduleArray;
    }
}