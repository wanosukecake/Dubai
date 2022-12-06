<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Manager\ManagerRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable as Carbon; 

class ManagerService extends BaseService
{
    public function __construct(ManagerRepositoryInterface $managerRepositoryInterface)
    {
        $this->manager = $managerRepositoryInterface;
    }

    public function createUser(array $request) 
    {
        return $this->manager->createUser($request);
    }
}