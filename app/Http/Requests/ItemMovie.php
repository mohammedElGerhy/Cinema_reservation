<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemMovie extends FormRequest
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
            'from' => 'required|string|max:100',
            'to' => 'required',
            'ticket' => 'required|string|max:100',
            'id_lounge' => 'required|exists:lounges,id',
            'id_movies' => 'required|exists:moves,id',

        ];
    }
    public function messages()
    {
        return [
            'from.required' => 'Date Time From  the required',
            'to.required' => 'Date Time To  the required',
            'ticket.required' => 'ticket the required',
            'ticket.string' => 'fell input string or number',
            'id_lounge.exists' => 'this lounge not fount',
            'id_movies.exists' => 'this movies not fount',

    ];
    }
}
