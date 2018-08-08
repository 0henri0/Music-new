<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name' => 'required|min:3|unique:countries,name',
        ];
    }
    /**
     * send notification value in form fail
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'You have not entered a song name yet.',
            'name.min' => 'You must enter more than 3 characters.',
            'name.unique' => 'name country already exist.',
        ];
    }
}
