<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array  $substanceIds
 */
class DrugSearchRequest extends FormRequest
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
            'substanceIds' => ['required', 'array', 'max:5', 'min:2'],
        ];
    }

    public function messages()
    {
        return ['min' => 'Не ленись, добавь веществ'];
    }
}
