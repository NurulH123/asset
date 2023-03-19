<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaintenanceRequest;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Maintenance;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $data = [
            'assets'        => Asset::all(),
            'suppliers'     => Supplier::all(),
            'assetTypes'    => AssetType::all(),
        ];
        $maintenance = Maintenance::with(['asset.type', 'supplier'])->get();

        if (request()->ajax()) {
            return $this->simpleData($maintenance);
        }

        return view('dashboard.maintenance.index', $data);
    }

    public function store(MaintenanceRequest $request)
    {
        $data = $request->all();
        $data['start_date'] = date('Y-m-d', strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d', strtotime($request->end_date));

        $maintenance = Maintenance::create($data);

        return $maintenance;
    }

    public function edit(Maintenance $maintenance)
    {
        return $maintenance;
    }

    public function update(MaintenanceRequest $request, Maintenance $maintenance)
    {
        $data = $request->all();
        $data['start_date'] = date('Y-m-d', strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d', strtotime($request->end_date));

        return $maintenance->update($data);
    }

    public function destroy(Maintenance $maintenance)
    {
        return  $maintenance->delete();
    }
}
