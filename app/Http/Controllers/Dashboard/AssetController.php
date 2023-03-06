<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Models\AssetType;
use App\Models\Brand;
use App\Models\Location;
use App\Models\Supplier;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with(['brand', 'supplier', 'location'])->get();
        $asset_types = AssetType::all();
        $brands = Brand::all();
        $locations = Location::all();
        $suppliers = Supplier::all();

        $datas = [
            'suppliers'     => $suppliers,
            'brands'        => $brands,
            'locations'     => $locations,
            'asset_types'   => $asset_types
        ];

        if (request()->ajax()) {
            return $this->simpleThreeAction($assets);
        }

        return view('dashboard.assets.index', $datas);
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

        $addType = Asset::create($data);

        return $addType;
    }

    public function edit(Asset $asset)
    {
        return $asset;
    }

    public function update(AssetRequest $request, Asset $asset)
    {

        return $asset->update($request->all());
    }

    public function destroy(Asset $asset)
    {
        return  $asset->delete();
    }
}
