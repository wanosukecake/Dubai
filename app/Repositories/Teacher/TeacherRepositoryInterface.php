<?php

namespace App\Repositories\Teacher;

interface TeacherRepositoryInterface
{
    public function getTeacherByTeacherId($teacherId);
}