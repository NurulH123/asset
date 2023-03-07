<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{
    Asset,
    Component,
    Supplier,
    Brand,
    Location,
    AssetType,
    Employee
};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    public function index()
    {
        $assets = Component::with(['brand', 'supplier', 'location'])->get();

        $datas = [
            'suppliers'     => Supplier::all(),
            'brands'        => Brand::all(),
            'locations'     => Location::all(),
            'asset_types'   => AssetType::all(),
            'employees'     => Employee::all(),
        ];

        if (request()->ajax()) {
            return $this->simpleThreeAction($assets);
        }

        return view('dashboard.components.index', $datas);
    }

    public function store(Request $request)
    {
        $type = AssetType::findOrFail($request->asset_type_id);
        $expl = explode(' ', $type->name);
        $split = str_split($expl[0], 3)[0];
        if (isset($expl[1])) {
            $split .= str_split($expl[1])[0];
        }
        $label = strtoupper($split);

        $data = $request->all();
        $data['asset_tag'] = $label.date('YdmHis').rand(1000,9999);
        $data['photo'] = $this->convertFile($request, 'asset_photo');
        $data['purchase_date'] = date('Y-m-d', $request->purchase_date);

        $addType = Component::create($data);

        return $addType;
    }

    public function edit(Asset $asset)
    {
        return $asset;
    }

    public function update(Request $request, Asset $asset)
    {
        $data = $request->all();
        if ($request->file('asset_photo')) {
            $photoname = explode('/', $asset->photo)[3];
            $stoPath = 'public/photo/asset_photo/'.$photoname;
            Storage::delete($stoPath); // Menghapus photo yg sebelumnya

            $data['photo'] = $this->convertFile($request, 'asset_photo');
        }

        return $asset->update($data);
    }

    public function destroy(Asset $asset)
    {
        return  $asset->delete();
    }
}
