<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumSongerRequest extends FormRequest
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
            'name' => 'min:3',
        ];
    }

    /**
     * send notification value in form fail
     * @return array
     */
    public function messages()
    {
        return [
            'name.min' => 'You must enter more than 3 characters.',
        ];
    }
}
