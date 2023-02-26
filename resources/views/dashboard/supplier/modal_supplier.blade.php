<div class="modal fade" tabindex="-1" role="dialog" id="m_supplier">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4"></h5>
                <div class="nk-country-m_supplier">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nama<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input name="name" type="text" class="form-control" id="default-01" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Email</label>
                            <div class="form-control-wrap">
                                <input name="email" type="email" class="form-control" id="default-01" placeholder="Masukkan email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Alamat<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input name="address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">No Hp<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">+62</span>
                                </div>
                                <input name="phone" type="number" class="form-control" placeholder="contoh: 81378239xxx" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Kota</label>
                            <div class="form-control-wrap">
                                <input name="city" type="text" class="form-control">
                            </div>
                        </div>
                        <button id="supplier_submit" type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                    </form>
                    <div class="note mt-3">
                        <b>Note :</b>
                        <p><span class="text-danger">*</span> = Wajib Diisi</p>
                    </div>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
