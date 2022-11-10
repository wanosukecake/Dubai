<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
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
