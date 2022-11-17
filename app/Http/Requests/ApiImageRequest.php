<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiImageRequest extends FormRequest
{

    public function rules()
    {
        return [
            'color' => 'string|max:25|required',
            'size' => 'string|max:3|required',
            'sexe' => 'string|max:1|required|in:f,h',

            'imgUrl' => 'string',
        ];

    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'color.required' => 'A title is required',
            'body.required' => 'A message is required',
            'sexe.required' => 'Pas le bon sexe',
            'sexe.in' => 'tainbira',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
