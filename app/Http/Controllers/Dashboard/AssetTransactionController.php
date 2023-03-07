<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Asset;
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
}
