<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Depreciation;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepreciationRequest;
use App\Http\Controllers\Dashboard\Traits\Deprecation\ProcessingData;
use App\Http\Controllers\Dashboard\Traits\Deprecation\DepreciationProperty;

class DepreciationController extends Controller
{
    use DepreciationProperty, ProcessingData;

    public function index()
    {
        $datas = Depreciation::all();

        if (request()->ajax()) {
            return $this->dataDeprecation($datas);
        }

        return view('dashboard.depreciations.index', $datas);
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
