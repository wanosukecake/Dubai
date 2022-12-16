<?php

namespace App\Repositories\Teacher;

use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{   
    public function getTeacherByTeacherId($teacherId)
    {
        return Teacher::find($teacherId);
    }

}