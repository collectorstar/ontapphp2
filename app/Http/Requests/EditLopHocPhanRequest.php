<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLopHocPhanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'malop'=>'required|max:10',
            'tenlop'=>'required',
            'makhoahoc'=>'required|numeric|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'malop.required' => 'Mã lớp không được để trống',
            'malop.max'=>'Mã lớp phải nhỏ hơn 10 ký tự',
            'tenlop.required' => 'Tên lớp không được để trống',
            'makhoahoc.required'=> 'Mã khóa học không được để trống',
            'makhoahoc.numeric | makhoahoc.min'=>'Mã khóa học phải là số',
            'makhoahoc.min'=>'Mã khóa học phải lớn hơn 1',
        ];
    }
}
