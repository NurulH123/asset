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
        $data = $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );

        $addType = AssetType::create($data);

        return $addType;
    }

}
