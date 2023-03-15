<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['same:password'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama harus diisi',
            'email.required'    => 'Email harus diisi',
            'email.email'       => 'Format email tidak sesuai',
            'email.unique'      => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min'      => 'Minimal password 6 karakter',
            'confirm_password.same'=> 'Konfirmasi password tidak sesuai',
        ];
    }
}
