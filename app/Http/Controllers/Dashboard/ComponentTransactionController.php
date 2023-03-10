<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\ComponentTransaction;

class ComponentTransactionController extends Controller
{
    public function statusType(Component $component)
    {
        return $component;
    }

    public function store(Request $request, Component $component)
    {
        $status = $component->isCheckin;
        $availableQty = $component->available_quantity;

        $data = $this->validate($request, [
            'asset_id'      => 'required',
            'status_date'   => 'required',
            'quantity'      => 'required',
        ]);

        if ($request->quantity > $availableQty) {
            return response()->json([
                'status'    => 'failed',
                'msg'       => 'jumlah component terlalu banyak'
            ], 500);
        }

        $data['status_date'] = date('Y-m-d', strtotime($data['status_date']));
        $data['status'] = $status ? "checkout" : "checkin";

        $transaction = $component->transaction()->create($data);
        $component->update([
            'available_quantity'    => $availableQty - $request->quantity,
            'isCheckin'             => !$status
        ]); // update component

        return $transaction;
    }

    public function assetComponent($assetId)
    {
        $component = ComponentTransaction::where('asset_id', $assetId)
                        ->with([
                            'components.type',
                            'components.supplier',
                            'components.location',
                            'components.brand',
                            ])
                        ->get();

        return $this->datatableNonAction($component);
    }
}
