<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'full_name' => 'required|min:5|max:255|string',
            'cpf' => 'required|min:11|max:11|unique:users,cpf',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:14',
            'password' => 'required|max:30'
        ];
    }

    public function messages()
    {
        return [
            "unique" => "Este dado não pode ser utilizado",
            "required" => "Este Campo é requerido",
            "password" => "A senha não é valida"
        ]; // TODO: Change the autogenerated stub
    }

}