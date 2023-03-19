<?php
namespace App\Http\Controllers\Dashboard\Traits\Deprecation;

/**
 *
 */
trait AccumulationData
{
    /**
     *  Mengakumulasikan data deprecation menjadi list data
     *
     *  @return array
     */
    protected function dataAcummulation($type)
    {
        $cost = $type->cost;
        $residu = $cost - $type->depreciation->asset_value;
        $periode = $type->depreciation->periode;
        $penyebut = $this->sumYearsDigit($periode);
        $data = [
            [
                'property'      => null,
                'year'          => 0,
                'depreciation'  => '',
                'accumulation'  => '',
                'value_of_book' => $cost
            ]
        ];

        for ($n=1; $n <= $periode; $n++) {
            $item = [];
            $pembilang = $periode - ($n - 1);
            $bilPecahan = $pembilang.'/'.$penyebut;
            $depreciation = $n === 0 ? 0 : $pembilang / $penyebut * $residu;
            $accPenyusutan = $n === 0 ? 0 : ($n === 1 ? $depreciation : $data[$n-1]['accumulation'] + $depreciation);
            $valueBook = $n === 0 ? $cost : $cost - $accPenyusutan;

            $item = [
                'property'          => [
                    'residu'  => $residu,
                    'bil_pecahan'   => $bilPecahan,
                ],
                'year'              => $n,
                'depreciation'      => $depreciation,
                'accumulation'      => ($accPenyusutan),
                'value_of_book'     => $valueBook,
            ];

            array_push($data, $item);
        }

        return $data;
    }

    /**
     *
     *  Menghitung rumus jumlah angka tahun
     *
     */
    protected function sumYearsDigit($periode)
    {
        $rumus = ($periode * ($periode + 1)) / 2;

        return $rumus;
    }

    /**
     *  Mengembalikan datatables
     *
     *  @return datatable
     */
    protected function listData($datas)
    {

        return datatables($datas)
                ->editColumn('depreciation', function($query) {
                    if (!is_null($query['property'])) {
                        $bilPecahan = $query['property']['bil_pecahan'];
                        $residu = $query['property']['residu'];
                        $depreciation = $query['depreciation'];

                        return $bilPecahan.' X '.number_format($residu,0,'.','.').' = '.number_format($depreciation,0,'.','.');
                    }
                })
                ->editColumn('accumulation', function($query) {
                    return $query['accumulation'] !== '' ?
                             'Rp '.number_format($query['accumulation'],0,'.','.') : '';
                })
                ->editColumn('value_of_book', function($query) {
                    return 'Rp '.number_format($query['value_of_book'],0,'.','.');
                })
                ->make(true);
    }
}

