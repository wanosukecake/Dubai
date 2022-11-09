<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ManagerRequest extends FormRequest
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
        return [
            'user.email' => ['required', 'string', 'email', 'max:255'],
            'user.password' => ['max:10', 'required'],
            'user.is_initial_setting' => ['boolean', 'required'],
            'user.user_type' => [Rule::in(config('const.USER_TYPE')), 'integer', 'required']
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'user.email' => 'email',
            'user.password' => 'password',
            'user.is_initial_setting' => 'is_initial_setting',
            'user.user_type' => 'user_type',
        ];
    }


}
