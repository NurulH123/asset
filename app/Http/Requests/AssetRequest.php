<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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
            'name'          => 'required',
            'cost'          => 'required',
            'purchase_date' => 'required',
            'supplier_id'   => 'required',
            'brand_id'      => 'required',
            'location_id'   => 'required',
            'asset_type_id' => 'required',
            'status'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Nama aset harus diisi',
            'cost.required'             => 'Harga tidak boleh kosong',
            'purchase_date.required'    => 'Tanggal beli harus diisi',
            'supplier_id.required'      => 'Pemasok harus diisi',
            'brand_id.required'         => 'Merek tidak boleh kosong',
            'location_id.required'      => 'Lokasi kosong',
            'asset_type_id.required'    => 'Tipe aset harus diisi',
            'status.required'           => 'Status tidak boleh kosong',
        ];
    }
}
