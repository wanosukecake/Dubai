<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TeacherService extends BaseService
{
    public function __construct(TeacherRepositoryInterface $teacherRepositoryInterface)
    {
        $this->teacher = $teacherRepositoryInterface;
    }

    public function getUserTeacher()
    {
        return $this->teacher->getUserTeacher(Auth::id());
    }

    public function updateUserTeacher($request) 
    {
        return $this->teacher->updateUserTeacher($request, Auth::id());
    }
}