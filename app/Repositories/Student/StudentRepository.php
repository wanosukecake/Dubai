<?php

namespace App\Repositories\Student;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface
{   
    public function getUserStudent($user_id)
    {
        // user経由でstudentを取得する
        $result = User::find($user_id);
//        $result = User::with('student')->where('id', $user_id)->get();
        return $result;
    }

    public function saveUserStudent($request, $student, $user, $userId)
    {
        // パスワードが存在していればパスワードを更新する。
        $userData = $request->get('user', []);
        // TODO:あとで消す。
        $result = null;
        if(isset($userData['password'])) {
            $result = User::where('id', $userId)
                        ->first()
                        ->update([
                            'password' => Hash::make($userData['password']),
                            // TODO:仮フラグ
                            'kari' => 1
                        ]);
        }

        return $result;

    }
}