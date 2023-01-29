<?php

namespace App\Repositories\Teacher;

interface TeacherRepositoryInterface
{
    public function getUserTeacher($user_id);
    public function getTeacher($user_id);
    public function getTeacherByTeacherId($teacherId);
    public function updateUserTeacher($request, $userId);
}