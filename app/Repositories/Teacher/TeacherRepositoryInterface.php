<?php

namespace App\Repositories\Teacher;

interface TeacherRepositoryInterface
{
    public function getUserTeacher($user_id);
    public function updateUserTeacher($request, $userId);
    public function getTeacherByTeacherId($teacherId);
}