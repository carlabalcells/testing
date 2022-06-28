<?php

namespace App\Http\Requests\Category;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            //'slug' => Str::of(($this->title)->slug()->append("-addicional")),
            //'slug' => str($this->title)->slug()
        ]);

    }

    static public function myRules(){
        return [ 
            "name" => "required|min:5|max:200",
            "slug" => "required|min:5|max:200|unique:categories,slug"
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
        return $this->myRules();
    }
}
