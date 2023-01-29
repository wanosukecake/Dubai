<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Teacher;

class ScheduleService extends BaseService
{
    public function __construct(ScheduleRepositoryInterface $scheduleRepositoryInterface)
    {
        $this->schedule = $scheduleRepositoryInterface;
    }

    public function createSchedule($request, $userTeacher)
    {
        $request->merge(['teacher_id' => $userTeacher->teacher->id]);
        $requestArray = $request->all();
        return $this->schedule->createSchedule($requestArray);
    }

    public function getSchedules(Request $request, Teacher $teacher): array
    {
        $requestArray = array(
            'start_date' => date('Y-m-d', $request->input('start_date') / 1000),
            'end_date'=> date('Y-m-d', $request->input('end_date') / 1000),
            'teacher_id' => $teacher->id
        );

        return $this->schedule->getSchedules($requestArray);
    }
}