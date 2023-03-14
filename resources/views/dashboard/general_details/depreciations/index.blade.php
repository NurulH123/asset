@php
    if (isset($type->depreciation)) {
        $n = $type->depreciation->periode;
        $cost = $type->cost;
        $residu = $type->depreciation->asset_value;

        $sumYearsDigit = ($n * ($n+1)) / 2;
        $depreciation = $cost - $residu;
    }
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content my-4">
                    <h3 class="nk-block-title">List Akumulasi Penurunan Nilai</h3>
                    <p>Dalam perhitungan penyusutan nilai aset kami menggunakan metode <strong>JUMLAH ANGKA TAHUN</strong></p>
                    @isset($type->depreciation)
                    <div class="my-3" id="info">
                        <strong>Keterangan :</strong>
                        <ul>
                            <li>
                                Jumlah Angka Tahun = ({{ $type->depreciation->periode }} X ({{  $type->depreciation->periode }} + 1)) / 2 = {{ $sumYearsDigit }}
                            </li>
                            <li>
                                Aset Tetap yang disusutkan = {{ $type->cost }} - {{ $type->depreciation->asset_value }} = {{ $depreciation }}
                            </li>
                        </ul>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-body">
                <table width="100%" id="t_depreciations" class="table table-bordered table-striped">
                    @isset($type->depreciation)
                        <thead>
                            <tr>
                                <th scope="col">Tahun ke-</th>
                                <th scope="col">Beban Penyusutan</th>
                                <th scope="col">Akumulasi Penyusutan</th>
                                <th scope="col">Nilai Buku Akhir Tahun</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    @else
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="text-success">Data Kosong</p>
                        </div>
                    </div>
                    @endisset
                </table>
            </div>
        </div>
    </div>
</div>

@isset($type->depreciation)
    @push('scripts_bottom')
        @include('dashboard.general_details.depreciations.script_depreciations')
    @endpush
@endisset
