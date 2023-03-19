<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{
    Asset,
    AssetTransaction,
    Component,
    ComponentTransaction,
    Employee,
    Maintenance
};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Traits\Dashboard\GroupingData;

class DashboardController extends Controller
{
    use GroupingData;

    public function index()
    {
        $data = [
            'type'          => $this->assetByType(),
            'status'        => $this->assetByStatus(),
            'assets'        => Asset::all(),
            'employees'     => Employee::all(),
            'components'    => Component::all(),
            'maintenances'  => Maintenance::all(),
            'asset_transaction' => AssetTransaction::all(),
            'component_transaction' => ComponentTransaction::all(),
        ];

        if(request()->ajax()) {
            return collect($data)->only(['type', 'status']);
        }

        return view('dashboard.dashboard.index', $data);
    }
}
