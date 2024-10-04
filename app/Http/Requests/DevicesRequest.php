<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevicesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'device_name' => 'required',
        ];
    }

    public function message()
    {
        return [
            'device_name.required' => 'Nama Perangkat Tidak Boleh Kosong',
            'phone.required' => 'Nomor Hp Tidak Boleh Kosong',
        ];
    }

    public function failedValidation(Validator $valid)
    {
        throw new HttpResponseException(response()->json([
            'stats' => false,
            'message' => 'Validasi gagal',
            'error' => $valid->errors()
        ]));
    }
}
