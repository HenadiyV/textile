<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextileCategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return auth()->check();
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
               'parent_id'      => 'required|integer|exists:textile_categories,id',
               'slug'           =>  'max:200',
               'title'          =>  'string|min:5|max:500',
               'info_category'  =>  'string|min:3|max:200',
           ];

    }
}
