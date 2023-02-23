<?php

namespace  App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function simpleData($data)
    {
        return datatables($data)
                ->addIndexColumn()
                ->addColumn('action', function($q) {
                    return '<button onclick="edit('. $q->id .')" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i>Ubah</button> '.
                    '<button onclick="remove('. $q->id .')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i>Hapus</button>';
                })
                ->make(true);
    }
}
