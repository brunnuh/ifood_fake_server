<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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

        $rules = [
            "image" => "nullable",
            "name" => "required|max:255",
            "phone" => "required|max:15"
        ];
        if($this->method() == "PUT"){
            $rules["name"] = "nullable";
            $rules["phone"] = "nullable";
        }
        return $rules;
    }
}
