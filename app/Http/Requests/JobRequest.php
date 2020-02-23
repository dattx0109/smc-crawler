<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'job_name'      => 'required|min:2|max:50',
            'link_url_test' => "required|url",
            'company_name' => "required"
        ];
    }

    public function messages()
    {
        return [
            'job_name.required'         => 'Tên công việc là trường bắt buộc',
            'job_name.min'              => 'Tên công việc phải nhiều hơn 6 kí tự',
            'job_name.max'              => 'Tên công việc không được nhiều hơn 50 kí tự',
            'link_url_test.required'    => 'Url crawler test là trường bắt buộc',
            'link_url_test.url'         => 'Url crawler test nhập không đúng định dạng',
            'company_name.required'         => 'Tên công ty là trường bắt buộc'

        ];
    }
}
