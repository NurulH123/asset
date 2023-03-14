<?php
namespace App\Http\Controllers\Dashboard\Traits\Deprecation;

use App\Models\Asset;
use App\Models\Component;
use Illuminate\Http\Request;

trait DepreciationProperty
{
    protected function getCategory($type)
    {
        $categories = $type === 'asset' ?
                Asset::doesntHave('depreciation')->get(['id','name']) :
                Component::doesntHave('depreciation')->get(['id','name']);

        return view('dashboard.depreciations.select_options', compact('categories'));
    }

    protected function typeCategory(Request $request)
    {
        $category = $request->category;
        $type = $this->isAsset($category) ?
                    Asset::find($request->asset_id) :
                    Component::find($request->component_id);

        return $type;
    }

    /**
     *  Mengecek type category yg diberikan
     *
     *  @return boolean
     */
    protected function isAsset($category)
    {
        return $category === 'asset' ?? false;
    }

}

