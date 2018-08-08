<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingerRequest extends FormRequest
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
            'avatar' => 'file|image|mimes:jpeg,jpg',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.min' => 'NAME must have at least 3 characters',
            'avatar.image' => 'not support img',
        ];
    }
}
