<div class="row">
    <div class="col-md-12">
        <div class="my-4">
            <div class="p-1">
                <h4><b>List Pemakaian {{ $component->name }}</b></h4>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-body">
                <table width="100%" id="t_component_details" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aset</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts_bottom')
    @include('dashboard.component_details.details.scripts.datatable')
@endpush
