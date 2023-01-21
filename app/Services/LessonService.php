<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable as Carbon;

class LessonService extends BaseService
{
    protected $lesson;
    protected $teacher;

    public function __construct(
        LessonRepositoryInterface $lessonRepositoryInterface,
        TeacherRepositoryInterface $teacherRepositoryInterface,
        StudentRepositoryInterface $studentRepositoryInterface)
    {
        $this->lesson = $lessonRepositoryInterface;
        $this->teacher = $teacherRepositoryInterface;
        $this->student = $studentRepositoryInterface;

    }

    // 授業が予約済みかチェック
    public function isReserved($lesson)
    {
        // 有効な授業かつ存在チェック
        $lesson = $this->getLessonByLessonId($lesson['id']);
        if (!$lesson) {
            abort(400);
        }

        // userIdから生徒レコードを取得
        $userStudent = $this->student->getUserStudent(Auth::user()->id);
        if (!$userStudent) {
            abort(400);
        }
 
        if ($userStudent->student->lessons->where('id', $lesson['id'])->isEmpty()) {
            // 予約なし
            return false;
        }
    
        return true;
    }

    // 受講可能な授業一覧を取得
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

    // teacherIdから先生情報を取得
    // ここに書くのは違うのかもしれない
    public function getTeacherByTeacherId($teacherId) 
    {
        return  $this->teacher->getTeacherByTeacherId($teacherId);
    }

    // 生徒が受講する授業を登録
    public function store($lessonId)
    {
        try {
            // 有効な授業かつ存在チェック
            $lesson = $this->getLessonByLessonId($lessonId);
            if (!$lesson) {
                abort(400);
            }

            // userIdから生徒レコードを取得
            $userStudent = $this->student->getUserStudent(Auth::user()->id);
            if (!$userStudent) {
                abort(400);
            }

            $param = [
                'lesson_id' => $lessonId,
                'student_id' => $userStudent->student['id']
            ];

            $this->lesson->createUserStudent($param);

            $mailParams = [
                'subject' => 'Thank you for reservation['. $lesson['lesson_name']. ']',
                'to' => $userStudent['email'],
                'template' => 'emails.reservation',
                'lesson' => $lesson,
                'user' => $userStudent
            ];

            $this->sendMail($mailParams);
        } catch (\Exception $e) {
            info($e->getMessage());
            abort(response()->json(['message' => 'you failed. Please check with your representative'], 400));
        }
    }

    public function cancel($lessonId)
    {
        try {
            // 有効な授業かつ存在チェック
            $lesson = $this->getLessonByLessonId($lessonId);
            if (!$lesson) {
                abort(400);
            }

            // userIdから生徒レコードを取得
            $userStudent = $this->student->getUserStudent(Auth::user()->id);
            if (!$userStudent) {
                abort(400);
            }

            $param = [
                'lesson_id' => $lessonId,
                'student_id' => $userStudent->student['id']
            ];

            $this->lesson->cancel($param);

            $mailParams = [
                'subject' => 'Cancel your reservation['. $lesson['lesson_name']. ']',
                'to' => $userStudent['email'],
                'template' => 'emails.cancel',
                'lesson' => $lesson,
                'user' => $userStudent
            ];

            $this->sendMail($mailParams);
        } catch (\Exception $e) {
            info($e->getMessage());
            abort(response()->json(['message' => 'you failed. Please check with your representative'], 400));
        }
    }

    private function getLessonByLessonId($lessonId)
    {
        return $this->lesson->getLessonByLessonId($lessonId);
    }

}