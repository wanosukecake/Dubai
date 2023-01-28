<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Schedule\ScheduleRepositoryInterface;

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
}