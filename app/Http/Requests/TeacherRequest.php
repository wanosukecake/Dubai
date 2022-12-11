<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = Auth::user()->id;
        return [
            'user.password' => 'max:10',
            'teacher.first_name' => [Rule::unique('teachers', 'first_name')->ignore($userId, 'user_id'), 'max:30', 'required'],
            'teacher.last_name' => [Rule::unique('teachers', 'last_name')->ignore($userId, 'user_id'), 'max:30', 'required'],
            'teacher.age' => 'integer | digits_between:0,3',
            'teacher.sex' => [Rule::in(config('const.SEX_LIST')), 'integer', 'required'],
            'teacher.introduction' => 'max:250',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'user.password' => 'password',
            'teacher.first_name' => 'first_name',
            'teacher.last_name' => 'age',
            'teacher.age' => 'age',
            'teacher.sex' => 'sex',
            'teacher.introduction' => 'introduction',
        ];
    }


}
