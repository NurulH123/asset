<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Dashboard\Traits\Depreciation;

class DepreciationRequest extends FormRequest
{
    use Depreciation;

    protected $type = '';
    protected $method = '';
    protected $category = '';

    protected $validCategory = '';
    protected $validType = '';

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
        $this->method = request('_method');
        $this->setProperty();

        return [
            'category'      => $this->validCategory,
            'periode'       => 'required',
            'asset_value'   => 'required',
            $this->type     => $this->validType,
        ];
    }

    public function messages()
    {
        $msgCategory = 'Kategori harus diisi';

        return [
            $this->category.'.'.$this->validCategory     => $msgCategory,
            'periode.required'      => 'Periode kosong',
            'asset_value.required'  => 'Nilai turunan harus diisi',
            $this->type.'.required' => 'Tipe kategori harus diisi',
        ];
    }

    private function setProperty()
    {
        if ($this->method !== 'PATCH') {
            $this->category = 'category';
            $this->validCategory = 'required';

            $category = request()->input('category');
            $this->type = $this->isAsset($category) ? 'asset_id' : 'component_id';
            $type = $this->type;
            $this->validType = 'required';
        }
    }
}
