<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Support\Str;
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
        $today = new Carbon('today');
        $afterDay = new Carbon('+3 day');

        foreach ($lessons as $key => $value) {
            $lessons[$key]['isNew'] = false;
            if (isset($value['created_at']) && Carbon::parse($value['created_at'])->between($today, $afterDay)) {
                $lessons[$key]['isNew'] = true;
            }

            if ($value['content']) {
                $lessons[$key]['content'] = Str::limit($value['content'], 100, '...');
            } else {
                $lessons[$key]['content'] = '-';
            }
        }

        return $lessons;
    }
}