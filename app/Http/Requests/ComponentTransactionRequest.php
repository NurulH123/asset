<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentTransactionRequest extends FormRequest
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
            'asset_id'      => 'required',
            'status_date'   => 'required',
            'quantity'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'asset_id.required'     => 'Nama aset harus diisi',
            'quantity.required'     => 'Status kosong',
            'status_date.required'  => 'Tanggal tidak boleh kosong',
        ];
    }
}
