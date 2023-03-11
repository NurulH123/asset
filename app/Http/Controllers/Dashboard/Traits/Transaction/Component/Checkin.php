<?php
namespace App\Http\Controllers\Dashboard\Traits\Transaction\Component;

use App\Http\Requests\CheckinRequest;
use Illuminate\Http\Request;
use App\Models\ComponentTransaction;

/**
 *
 */
trait Checkin
{
    protected function amountQtyChildren($reqQty = 0, $parentId)
    {
        $children = ComponentTransaction::where('parent_id', $parentId)->get();
        $amountQty = $children->sum('quantity');
        $amount = $amountQty + $reqQty;

        return $amount;
    }
}

