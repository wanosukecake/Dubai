<?php

namespace App\Repositories\Manager;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ManagerRepository implements ManagerRepositoryInterface
{
    /**
     * @var App\Models\User
     */
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function createUser(array $request): bool
    {
        DB::beginTransaction();
        try {
            $this->user->create($request);

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          info($e->getMessage());

          return false;
        }

        return true;
    }
}