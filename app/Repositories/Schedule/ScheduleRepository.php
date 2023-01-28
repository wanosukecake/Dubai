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
}