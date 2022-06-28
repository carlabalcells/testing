<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
class StoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            //'slug' => Str::of(($this->title)->slug()->append("-addicional")),
            //'slug' => str($this->title)->slug()
        ]);
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if($this->expectsJson()){
            $response = new Response($validator->errors(),422);
            throw new ValidationException($validator,$response);
        }
    }

    static public function myRules(){
        return [ 
            "title" => "required|min:5|max:200",
            "slug" => "required|min:5|max:200|unique:posts,slug",
            "description" => "required|min:7",
            "content" => "required|min:7",            
            "category_id" => "required|integer",
            "posted" => "required"
        ];
    }
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
        return $this->myRules();
    }
}
