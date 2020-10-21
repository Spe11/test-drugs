<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property bool   $visible
 */
class SubstanceRequest extends FormRequest
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
        $id = $this->route('substance')->id ?? null;

        return [
            'name' => ['required', "unique:substances,name,$id", 'max:255'],
            'visible' => ['required', 'boolean'],
        ];
    }
}
