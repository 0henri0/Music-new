<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3',
            'password' => 'min:6|max:32',
            'passwordAgain' => 'same:password',
            'avatar' => 'file|image|mimes:jpeg,jpg,png',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.min' => 'NAME must have at least 3 characters',
            'password.required' => 'please enter password',
            'passwordAgain' => 'same:password',
            'password.min' => 'PASSWORD must have at least 6 characters',
            'password.max' => 'PASSWORD must have at most 32 characters',
            'passwordAgain.same' => 'CONFIRM PASSWORD is not correct',
            'avatar.image' => 'not support img',
        ];
    }
}
