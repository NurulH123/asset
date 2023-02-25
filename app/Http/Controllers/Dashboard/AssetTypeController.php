<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AssetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetTypeController extends Controller
{
    public function index()
    {
        $dataType = AssetType::all();

        if (request()->ajax()) {
            return $this->simpleData($dataType);
        }

        return view('dashboard.asset_type.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );
        $data = $request->all();

        $addType = AssetType::create($data);

        return $addType;
    }

    public function edit(AssetType $asset_type)
    {
        return $asset_type;
    }

    public function update(Request $request, AssetType $asset_type)
    {

        return $asset_type->update($request->all());
    }

    public function destroy(AssetType $asset_type)
    {
        return  $asset_type->delete();
    }
}
