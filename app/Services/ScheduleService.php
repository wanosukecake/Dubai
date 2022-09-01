<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use Auth;
use Carbon\CarbonImmutable as Carbon; 

class ScheduleService extends BaseService
{
    protected $lesson;

    public function __construct(ScheduleRepositoryInterface $scheduleRepositoryInterface)
    {
        $this->schedule = $scheduleRepositoryInterface;
    }
}