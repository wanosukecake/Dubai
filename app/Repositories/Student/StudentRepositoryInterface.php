<?php

namespace App\Repositories\Student;

interface StudentRepositoryInterface
{
    public function getUserStudent($user_id);

    public function saveUserStudent($request, $student, $user, $userId);
}