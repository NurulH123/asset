<div class="row">
    <div class="col-md-12">
        <div class="my-4">
            <div class="p-1">
                <h4><b>Transaksi {{ $asset->name }}</b></h4>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-body">
                <table width="100%" id="t_asset_maintenance" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pemasok</th>
                            <th scope="col">Tipe Aset</th>
                            <th scope="col">Status</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Berakhir</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts_bottom')
    @include('dashboard.asset_details.maintenances.scripts.datatable')
@endpush
