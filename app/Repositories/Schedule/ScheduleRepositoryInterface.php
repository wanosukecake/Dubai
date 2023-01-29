<?php

namespace App\Repositories\Schedule;

interface ScheduleRepositoryInterface
{
    public function createSchedule($request);
    public function getSchedules(array $conditions);
}