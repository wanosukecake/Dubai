<?php

namespace App\Http\Controllers;

use App\Services\ManagerService;
use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    private $managerService;

    public function __construct(ManagerService $managerService)
    {
        $this->managerService = $managerService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('managers.add');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerRequest $request)
    {
        $data = $request->all();
        $result = $this->managerService->createUser($data);
        if ($result) {
            $flash = ['success' => 'データを更新しました。'];
        } else {
            $flash = ['error' => 'データの更新に失敗しました。'];
        }

        return redirect()
            ->route('manager.add')
            ->with($flash);
    }
}