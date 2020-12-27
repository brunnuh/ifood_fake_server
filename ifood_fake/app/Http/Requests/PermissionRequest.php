<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => 'required|unique:permissions',
            'description' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return[
          "unique" => "Essa permissão já foi cadastrada",
          "max" => "maximo de letras é 255"
        ];
    }
}
