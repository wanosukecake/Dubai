<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    public function __construct(ScheduleService $scheduleService)
    {
        parent::__construct();
        $this->scheduleService = $scheduleService;
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
}
