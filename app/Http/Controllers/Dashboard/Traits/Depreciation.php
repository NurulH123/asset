<?php
namespace App\Http\Controllers\Dashboard\Traits;

use App\Models\Asset;
use App\Models\Component;
use Illuminate\Http\Request;

/**
 *
 */
trait Depreciation
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
     *  @return boolean
     */
    protected function isAsset($category)
    {
        return $category === 'asset' ?? false;
    }

    /**
     * 
     */
    protected function datatables($datas)
    {
        return datatables($datas)
                ->addIndexColumn()
                ->addColumn('name', function($query) {
                    return $query->depreciationable->name;
                })
                ->addColumn('category', function($query) {
                    $type = $query->depreciationable_type;
                    $category = $type === 'App\Models\Asset' ? 'Aset' : 'Komponen';

                    return $category;
                })
                ->editColumn('asset_value', function($query) {
                    return 'Rp '.number_format($query->asset_value,0,'','.');
                })
                ->addColumn('cost', function($query) {
                    return 'Rp '.number_format($query->depreciationable->cost,0,'','.');
                })
                ->addColumn('action', function($query) {
                    $id = $query->id;

                    return '<button onclick="edit('. $id .')" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><em class="icon ni ni-edit"></em> Ubah</button> '.
                    '<button onclick="remove('. $id .')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->make(true);
    }
}

