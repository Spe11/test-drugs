<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property array  $substanceIds
 */
class DrugRequest extends FormRequest
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
        $id = $this->route('drug') ?? null;

        return [
            'name' => ['required', "unique:drugs,name,$id", 'max:255'],
            'substanceIds' => ['required', 'array'],
            'substanceIds.*' => ['exists:substances,id'],
        ];
    }
}
