<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getReportsList($user_id);

    public function delete($report, $user_id);
}