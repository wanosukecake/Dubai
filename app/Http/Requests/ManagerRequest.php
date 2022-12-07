<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
        $this->merge(['is_initial_setting' => 0]);
        $this->merge(['password' => Hash::make($this->input('password'))]);

        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['max:10', 'required'],
            'user_type' => [Rule::in(config('const.USER_TYPE')), 'integer', 'required']
        ];
    }
}
