<div class="modal fade" tabindex="-1" role="dialog" id="m_asset_type">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Tambah Tipe Aset</h5>
                <div class="nk-country-m_asset_type">
                    <form action="{{ route('asset-type.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nama</label>
                            <div class="form-control-wrap">
                                <input name="name" type="text" class="form-control" id="default-01" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Diskripsi</label>
                            <div class="form-control-wrap">
                                <input name="describe" type="text" class="form-control" id="default-01" placeholder="Berikan Diskripsi">
                            </div>
                        </div>
                        <button id="type_submit" type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
