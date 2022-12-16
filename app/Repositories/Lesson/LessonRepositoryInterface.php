<?php

namespace App\Repositories\Lesson;

interface LessonRepositoryInterface
{
    public function getLessons($param);

    public function getLessonByLessonId($lessonId);

    public function createUserStudent($param);

    public function cancel($param);
}