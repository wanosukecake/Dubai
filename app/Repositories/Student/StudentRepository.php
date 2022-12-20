<?php

namespace App\Repositories\Student;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{   
    public function getUserStudent($user_id)
    {
        $result = User::with('student')->where('id', $user_id)->first();

        return $result;
    }

    public function updateUserStudent($request, $student, $userId)
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

            $studentData = $request->get('student', []);
            Student::updateOrCreate(['user_id' => $userId], $studentData);

            DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          info($e->getMessage());

          return false;
        }

        return true;
    }
}