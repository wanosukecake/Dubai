<?php

namespace App\Repositories\Teacher;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TeacherRepository implements TeacherRepositoryInterface
{   
    public function getUserTeacher($user_id)
    {
        $result = User::with('teacher')->where('id', $user_id)->first();

        return $result;
    }

    public function updateUserTeacher($request, $userId)
    {
        DB::beginTransaction();
        try {
            // パスワードが存在していればパスワードを更新する。
            $userData = $request->get('user', []);
            if (isset($userData['password'])) {
                User::where('id', $userId)
                    ->update([
                        'password' => Hash::make($userData['password']),
                    ]);
            }

            User::where('id', $userId)
                ->update([
                    'is_initial_setting' => 1
                ]);

            $teacherData = $request->get('teacher', []);
            teacher::where('user_id', $userId)
                        ->updateOrCreate($teacherData);

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          info($e->getMessage());

          return false;
        }

        return true;
    }

    public function getTeacherByTeacherId($teacherId)
    {
        return Teacher::find($teacherId);
    }

}