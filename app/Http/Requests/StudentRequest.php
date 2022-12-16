<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'student.first_name' => 'max:30|required',
            'student.last_name' => 'max:30|required',
            'student.age' => 'integer | digits_between:0,3',
            'student.sex' => [Rule::in(config('const.SEX_LIST')), 'integer', 'required'],
            'student.introduction' => 'max:250',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'user.password' => 'password',
            'student.first_name' => 'first_name',
            'student.last_name' => 'age',
            'student.age' => 'age',
            'student.sex' => 'sex',
            'student.introduction' => 'introduction',
        ];
    }
}