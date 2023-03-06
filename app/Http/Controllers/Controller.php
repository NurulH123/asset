<?php

namespace  App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
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

    protected function simpleThreeAction($data)
    {
        return datatables($data)
                ->addIndexColumn()
                ->editColumn('photo', function($q) {
                    $photoLink = $q->photo;

                    return '<img
                                width="50px"
                                class="card-img-top img-fluid rounded avatar-lg"
                                src="'.asset($photoLink).'"
                                alt="Images"
                            >';
                })
                ->addColumn('action', function($q) {
                    $id = $q->id;

                    return '<div class="form-control-wrap">
                                <select class="form-select js-select2" name="location_id" id="location_id">
                                    <option value="">...</option>
                                    <option value="checkout">Checkout</option>
                                    <hr>
                                    <option onclick="detail()" value="detail">Detail</option>
                                    <option onclick="edit()" value="edit">Edit</option>
                                    <option onclick="remove()" value="delete">Delete</option>
                                </select>
                            </div>';
                })
                ->rawColumns(['action', 'photo'])
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

    public function convertFile(Request $request, $name)
    {
        if ($request->file($name)) {
            $file = $request->file($name);
            $filename = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $path = 'public/photo/'.$name; // Nama yg tersimpan di folder storage

            $file->storeAs($path, $filename);

            return 'storage/photo/'.$name.'/'.$filename; // Nama yg tersimpan di database
        }

        return 'assets/images/noimage.png';
    }
}
