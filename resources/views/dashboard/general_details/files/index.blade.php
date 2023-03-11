<div class="row">
    <div class="col-md-12">
        <div class="my-4 d-flex justify-content-between">
            <div class="p-1">
                <h4><b>List File</b></h4>
            </div>
            <button onclick="addFile()" class="btn btn-success btn-md"><em class="icon ni ni-plus fw-bold"></em><span class="fw-bold">Tambah File</span></button>
        </div>
        <div class="card card-bordered">
            <div class="card-body">
                <table width="100%" id="t_files" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama</th>
                            <th scope="col">File</th>
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
    @include('dashboard.general_details.files.script_files')
@endpush
