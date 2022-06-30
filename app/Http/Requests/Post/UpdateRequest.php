<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
class UpdateRequest extends FormRequest
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

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if($this->expectsJson()){
            $response = new Response($validator->errors(),422);
            throw new ValidationException($validator,$response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [ 
            "title" => "required|min:5|max:200",
            "slug" => "min:5|max:200|unique:posts,slug,".$this->route("post")->id,
            "description" => "required|min:7",
            "content" => "required|min:7",            
            "category_id" => "required|integer",
            "posted" => "required",
            "image" => "mimes:jpg,png,jpeg|max:10240"
        ];
    }
}
