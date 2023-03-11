<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckinRequest extends FormRequest
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
            'quantity'      => 'required',
            'status_date'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required'     => 'Jumlah harus diisi',
            'status_date.required'  => 'Tanggal harus diisi',
        ];
    }
}
