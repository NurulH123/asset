<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $dataType = Brand::all();

        if (request()->ajax()) {
            return $this->simpleData($dataType);
        }

        return view('dashboard.brand.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );
        $data = $request->all();

        $addType = Brand::create($data);

        return $addType;
    }

    public function edit(Brand $brand)
    {
        return $brand;
    }

    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );

        return $brand->update($request->all());
    }

    public function destroy(Brand $brand)
    {
        return  $brand->delete();
    }
}
