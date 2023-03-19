<?php
namespace App\Http\Controllers\Dashboard\Traits;

use App\Models\Asset;
use App\Models\Component;
use Illuminate\Http\Request;

/**
 *
 */
trait File
{
    protected function type(Request $request = null)
    {
        $type = $request !== null ? $request->type : request('type');
        $id = $request !== null ? $request->id : request('id');

        return  $type === 'asset' ? Asset::find($id) : Component::find($id);
    }
}

