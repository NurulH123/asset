<?php

namespace  App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Dashboard\Traits\Datatable\ThreeAction;

class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests,
        ThreeAction;

    protected function datatableNonAction($datas)
    {
        return datatables($datas)
                ->addIndexColumn()
                ->addColumn('category', function($q) {
                    $status = '';

                    if (isset($q->status)) {
                        $color = $q->status === 'checkout' ? 'warning' : 'info';
                        $status = '<p class="badge bg-'.$color.'">'.$q->status.'</p>';

                        return $status;
                    }

                    return $status;
                })
                ->rawColumns(['category'])
                ->make(true);
    }

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

    protected function simpleThreeAction($data, $type)
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
                ->addColumn('action', function($q) use ($type) {
                    $link = route('asset.show', $q->id);

                    $liCheckout = $this->attributeForCheckout($q, $type);

                    return '<div class="nk-footer-links btn btn-success btn-md">
                                <ul class="nav nav-sm">
                                    <li Checkoutclass="nav-item dropdown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base" data-bs-toggle="dropdown" data-offset="0,1"><span>...</span></a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                            <ul class="language-list">
                                                '.$liCheckout.'
                                                <li>
                                                    <a href="'.$link.'" class="language-item">
                                                        <span class="language-name">Detail</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="edit('.$q->id.')" class="language-item">
                                                        <span class="language-name">Edit</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="remove('.$q->id.')" class="language-item">
                                                        <span class="language-name">Delete</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
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
