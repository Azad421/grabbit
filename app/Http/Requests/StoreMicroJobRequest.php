<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMicroJobRequest extends FormRequest
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
            'job_title' => 'required|unique:micro_jobs,job_title',
            'category' => 'required|exists:categories,category_id',
            'job_duration' => 'required|numeric',
            'budget' => 'required|numeric',
            'image' => 'nullable|mimes:JPG,jpg,PNG,png,JPEG,jpeg|max:5048'
        ];
    }

    public function attributes()
    {
        return [
            'job_title' => 'Job Title',
            'category' => 'Job Category',
            'job_duration' => 'Job Duration',
            'budget' => 'Job Budget',
            'image' => 'Job Image',
        ];
    }
}
