<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetTransaction;
use Illuminate\Http\Request;

class AssetTransactionController extends Controller
{
    public function statusType(Asset $asset)
    {
        return $asset;
    }

    public function store(Request $request, Asset $asset)
    {
        $status = $asset->isCheckin;

        $data = $this->validate($request, [
            'employee_id'   => 'required',
            'status_date' => 'required',
        ]);
        $data['status_date'] = date('Y-m-d', strtotime($data['status_date']));
        $data['status'] = $status ? "checkout" : "checkin";;

        $transaction = $asset->transaction()->create($data);
        $asset->update(['isCheckin' => !$status]); // update data isCheckin

        return $transaction;
    }

    public function assetTransaction($assetId)
    {
        $transaction = AssetTransaction::with(['asset.type', 'employee.department'])
                                ->where('asset_id', $assetId)
                                ->get();

        return $this->datatableNonAction($transaction);
    }

    public function assetActivity()
    {
        $activity = AssetTransaction::with(['asset:id,name', 'employee:id,name'])->get();

        return datatables($activity)
                ->editColumn('status', function($query) {
                    return $query->status === 'checkout' ?
                                '<span class="badge bg-warning">'.$query->status.'</span>' :
                                '<span class="badge bg-info">'.$query->status.'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
    }
}
