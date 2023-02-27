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
                    $id = $q->id;

                    return '<button onclick="edit('. $id .')" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><em class="icon ni ni-edit"></em> Ubah</button> '.
                    '<button onclick="remove('. $id .')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->make(true);
    }
    
    protected function phoneFormat($number)
    {
        $phoneSplit = str_split($number);

        if($phoneSplit[0] == '6' && $phoneSplit[1] == '2') {
            $phone = $number;
        } elseif ($phoneSplit[0] == '8') {
            $phone = '62'.$number;
        } elseif ($phoneSplit[0] == 0) {
            $phone = '62';

            for ($i=1; $i < strlen($number)  ; $i++) {
                $phone .= $phoneSplit[$i];
            }
        } else {
            $phone = '62';

            for ($i=1; $i < strlen($number)  ; $i++) {
                $phone .= $phoneSplit[$i];
            }
        }

        return $phone;
    }
}
