<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
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
            'supplier_id'   => 'required',
            'asset_type_id' => 'required',
            'type'          => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'asset_id.required'      => 'Aset harus diisi',
            'supplier_id.required'   => 'Pemasok kosong',
            'asset_type_id.required' => 'Tipe aset harus diisi',
            'type.required'          => 'Status harus diisi',
            'start_date.required'    => 'Tanggal mulai kosong',
            'end_date.required'      => 'Tanggal berakhir kosong',
        ];
    }
}
