<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'image' => 'required_without:id|mimes:jpg,png,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name moviesImage the required',
            'name.string' => 'name moviesImage the string',
            'image.mimes' => 'fil image extension jpg and png and jpeg ',
            'image.required_without' => 'this image is required',
        ];

    }
}
