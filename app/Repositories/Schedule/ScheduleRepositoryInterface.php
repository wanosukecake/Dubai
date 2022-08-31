<?php

namespace App\Repositories\Schedule;

interface ScheduleRepositoryInterface
{
    public function getReportsList($user_id);

    public function delete($report, $user_id);
}