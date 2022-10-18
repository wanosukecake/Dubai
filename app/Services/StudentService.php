<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable as Carbon; 

class StudentService extends BaseService
{

    public function __construct(StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->student = $studentRepositoryInterface;
    }

    public function getUserStudent()
    {
        return $this->student->getUserStudent(Auth::id());
    }

    public function updateUserStudent($request, $student) 
    {
        return $this->student->updateUserStudent($request, $student, Auth::id());
    }
}