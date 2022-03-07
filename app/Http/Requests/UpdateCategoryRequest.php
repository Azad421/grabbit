<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_name' => 'required|unique:categories,category_name,'.$this->category.',category_id',
            'category_status' => 'required',
            'description' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => 'Category Name',
            'category_status' => 'Category Status',
            'description' => 'Category Description'
        ];
    }
}
