<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSinhVienRequest extends FormRequest
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
            'TenSV'=>'required',
            'MSSV'=>'required|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'TenSV.required' => 'Tên sinh viên không được để trống',
            'MSSV.required' => 'MSSV không được để trống',
            'MSSV.max'=>'MSSV không vượt quá 10 ký tự',
        ];
    }
}
