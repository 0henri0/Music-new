<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumSingerRequest extends FormRequest
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
            'name' => 'min:3|unique:album_singers',
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
            'name.unique'=>'name already exist!'
        ];
    }
}
