<?php
namespace App\Http\Controllers\Dashboard\Traits\Deprecation;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\Traits\Deprecation\{DepreciationProperty, AccumulationData};

trait ProcessingData
{
    use DepreciationProperty, AccumulationData;

    protected function dataList()
    {
        $data = [
            request('type') => request('typeId'),
            'category'      => request('category'),
        ];
        $request = new Request($data);
        $type = $this->typeCategory($request); // Mengembalikan Object Asset atau Component
        $datas = $this->dataAcummulation($type);

        return $this->listData($datas);
    }

    /**
     *
     *  Mengambil data deprecation dan mengembalikan datatables
     *
     *  @return datatables
     */
    protected function dataDeprecation($datas)
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
