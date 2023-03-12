<div class="modal fade" tabindex="-1" role="dialog" id="m_depreciation">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4"></h5>
                <div class="msg-alert mb-1"></div>

                <div class="nk-country-m_depreciation">
                    <form method="post">
                        @csrf @method('PATCH')
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Kategori<span class="text-danger">*</span></label>
                            <select class="form-select" name="category" id="category">
                                <option value=""></option>
                                <option value="asset">Aset</option>
                                <option value="component">Komponen</option>
                            </select>

                            <div class="err err_category p-1">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group" id="type_category" style="display: none">
                            <label class="form-label" id="labelCategory" for="default-01"></label>
                            <select class="form-select" id="category_id">
                                <option value=""></option>
                            </select>

                            <div id="" class="err p-1">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Periode (bulan)<span class="text-danger">*</span></label>
                            <input class="form-control" name="periode" type="number" class="form-controll">
                            <div class="err err_periode p-1">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nilai Aset<span class="text-danger">*</span></label>
                            <input class="form-control" name="asset_value" id="asset_value" type="number" class="form-controll">

                            <div class="err err_asset_value p-1">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <button id="depreciation_submit" type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
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
