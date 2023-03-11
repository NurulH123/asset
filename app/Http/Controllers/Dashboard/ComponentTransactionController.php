<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Asset;
use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComponentTransaction;
use App\Http\Requests\CheckinRequest;
use App\Http\Controllers\Dashboard\Traits\Transaction\Component\Checkin;

class ComponentTransactionController extends Controller
{
    use Checkin;

    /**
     *  ===========================================
     *  |------------- PROSES CHECKIN ------------|
     *  ===========================================
     */

    public function showCheckin(ComponentTransaction $transaction)
    {
        return $transaction;
    }

    public function checkin(CheckinRequest $request, ComponentTransaction $transaction)
    {
        $availableQtyComponent = $transaction->components->available_quantity; // Jumlah komponen yg tersedia sekarang

        $parentId = $transaction->id;
        $reqQty = $request->quantity;

        $amountNow = $transaction->quantity;// Jumlah yg sekarang
        $amountQty = $this->amountQtyChildren($reqQty, $parentId);

        if ($amountQty > $amountNow) {
            return response()->json([
                'status'    => 'failed',
                'msg'       => 'Jumlah tidak sesuai'
            ], 501);
        }

        $different = $amountNow - $amountQty;
        $isCheckin = $different == 0 ?? false;


        /**
         *  ================ PROSES UPDATETING ============
         */
        // component yg sebelumnya belum di checkin, pd saat dicheckout maka status ISCHECKIN berubah jdi true
        // jika jumlah yg dikembalikan sama dengan jumlah total saat meminjam, maka status ISCHECKIN nya menjadi true
        $transaction->update(['isCheckin' => $isCheckin]);
        $transaction->components->update(['available_quantity' => $availableQtyComponent + $request->quantity]);

        // Menambahkan data checkin
        $data = $request->all();
        $data['status_date'] = date('Y-m-d', strtotime($request->status_date));
        $data['status'] = 'checkin';
        $data['isCheckin'] = true;
        $data['parent_id'] = $transaction->id;

        // $createTransaction = $transaction->child()->create($data);
        $createTransaction = ComponentTransaction::create($data);

        // ================= END UPDATETING ===================


        return $createTransaction;

    }
    // ================== END CHECKIN ==================

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
        $data['status'] = "checkout";

        $transaction = $component->transaction()->create($data);
        $component->update([
            'available_quantity'    => $availableQty - $request->quantity,
            'isCheckin'             => !$status
        ]); // update component

        return $transaction;
    }

    public function assetComponent($assetId)
    {
        $assetComponent = ComponentTransaction::where('asset_id', $assetId)
                        ->with([
                            'components.type',
                            'components.supplier',
                            'components.location',
                            'components.brand',
                            ])
                        ->get();

        return $this->datatableNonAction($assetComponent);
    }

    public function componentTransaction($componentId)
    {
        $componentTransaction = ComponentTransaction::with('assets')->where([
                                    ['component_id', $componentId],
                                    ['status', 'checkout'],
                                    ['isCheckin', false]
                                ])->get();

        return datatables($componentTransaction)
                ->editColumn('quantity', function($query) {
                    $children = ComponentTransaction::where('parent_id', $query->id)->get();
                    $amountQty = $children->sum('quantity');
                    $qtyNow = $query->quantity;
                    $qty = $qtyNow - $amountQty;

                    return $qty;
                })
                ->addColumn('checkin', function($query) {
                    $transactionId = $query->id;

                    return '<button onclick="checkin('.$transactionId.')" type="button" class="btn btn-md btn-outline-primary">Check-in</buton>';
                })
                ->rawColumns(['checkin'])
                ->make(true);
    }

}
