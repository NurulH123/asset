<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentRequest extends FormRequest
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
            'quantity'      => 'required',
            'cost'          => 'required',
            'purchase_date' => 'required',
            'supplier_id'   => 'required',
            'brand_id'      => 'required',
            'location_id'   => 'required',
            'asset_type_id' => 'required',
            'status'        => 'required',
            'photo'         => 'mimes:png,jpg,jpeg',
        ];
    }
}
