<?php

namespace App\Repositories\Teacher;

interface TeacherRepositoryInterface
{
    public function getUserTeacher($user_id);
    public function updateUserTeacher($request, $teacher, $userId);
    public function getTeacherByTeacherId($teacherId);
}