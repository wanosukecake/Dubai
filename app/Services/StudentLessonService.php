<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable as Carbon; 

class StudentLessonService extends BaseService
{
    protected $lesson;

    public function __construct(LessonRepositoryInterface $lessonRepositoryInterface)
    {
        $this->lesson = $lessonRepositoryInterface;
    }

    public function getLessons($param)
    {
        $lessons = $this->lesson->getLessons($param);
        return $lessons;
    }
}