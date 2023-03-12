<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Depreciation;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Dashboard\Traits\Depreciation as TraitDeprecation;
use App\Http\Requests\DepreciationRequest;

class DepreciationController extends Controller
{
    use TraitDeprecation;

    public function index()
    {
        $datas = Depreciation::all();

        if (request()->ajax()) {
            return $this->datatables($datas);
        }

        return view('dashboard.depreciations.index', $datas);
    }

    public function show(Depreciation $depreciations)
    {
        return view('dashboard.asset_details.index', compact('asset'));
    }

    public function store(DepreciationRequest $request)
    {
        $data = $request->validated();
        $type = $this->typeCategory($request);

        $depreciation = $type->depreciation()->create($data);

        return $depreciation;
    }

    public function edit(Depreciation $depreciation)
    {
        $depreciation = Depreciation::with('depreciationable')
                            ->where('id', $depreciation->id)
                            ->get();
        return $depreciation;
    }

    public function update(DepreciationRequest $request, Depreciation $depreciation)
    {
        $data = [
            'periode'       => $request->periode,
            'asset_value'   => $request->asset_value,
        ];
        
        return $depreciation->update($data);
    }

    public function destroy(Depreciation $depreciation)
    {
        return  $depreciation->delete();
    }
}
