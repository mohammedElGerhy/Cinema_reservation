<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoungeRequest extends FormRequest
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
            'Number_chairs' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name lounge the required',
            'name.string' => 'name lounge the string',
            'Number_chairs.required' => 'Number_chairs lounge the required',


        ];
    }
}
