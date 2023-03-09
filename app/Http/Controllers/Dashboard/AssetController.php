<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Models\AssetType;
use App\Models\Brand;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with(['brand', 'supplier', 'location'])->get();

        $datas = [
            'suppliers'     => Supplier::all(),
            'brands'        => Brand::all(),
            'locations'     => Location::all(),
            'asset_types'   => AssetType::all(),
            'employees'     => Employee::all(),
        ];

        if (request()->ajax()) {
            return $this->simpleThreeAction($assets, 'asset');
        }

        return view('dashboard.assets.index', $datas);
    }

    public function store(AssetRequest $request)
    {
        $type = AssetType::findOrFail($request->asset_type_id);
        $expl = explode(' ', $type->name);
        $split = str_split($expl[0], 3)[0];
        if (isset($expl[1])) {
            $split .= str_split($expl[1])[0];
        }
        $label = strtoupper($split);

        $data = $request->all();
        $data['asset_tag'] = $label.date('ymHis').rand(10,99);
        $data['photo'] = $this->convertFile($request, 'asset_photo');
        $data['purchase_date'] = date('Y-m-d', strtotime($request->purchase_date));

        $addType = Asset::create($data);

        return $addType;
    }

    public function edit(Asset $asset)
    {
        return $asset;
    }

    public function update(AssetRequest $request, Asset $asset)
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
