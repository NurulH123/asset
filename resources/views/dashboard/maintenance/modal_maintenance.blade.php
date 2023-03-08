<div class="modal fade" tabindex="-1" role="dialog" id="m_maintenance">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4"></h5>
                <div class="nk-country-m_maintenance">
                    <form method="post">
                        @csrf @method('PATCH')
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Aset<span class="text-danger">*</span></label>
                            <select class="form-select" name="asset_id" id="asset_id">
                                <option value=""></option>
                                @forelse ($assets as $asset)
                                    <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Pemasok<span class="text-danger">*</span></label>
                            <select class="form-select" name="supplier_id" id="supplier_id">
                                <option value=""></option>
                                @forelse ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Tipe Aset<span class="text-danger">*</span></label>
                            <select class="form-select" name="asset_type_id" id="asset_type_id">
                                <option value=""></option>
                                @forelse ($assetTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Status<span class="text-danger">*</span></label>
                            <select class="form-select" name="type" id="type">
                                <option value=""></option>
                                <option value="maintenance">Maintenance</option>
                                <option value="repair">Memperbaiki</option>
                                <option value="upgrade">Upgrade</option>
                                <option value="testing">Pengujian</option>
                                <option value="calibration">Kalibrasi</option>
                                <option value="software_support">Dukungan Perangkat Lunak</option>
                                <option value="hardware_support">Dukungan Perangkat Keras</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mulai Maintenance<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input id="start_date" name="start_date" type="text" class="form-control date-picker">
                            </div>
                            <div class="form-note">tanggal format <code>mm/dd/yyyy</code></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Berakhir Maintenance<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input id="end_date" name="end_date" type="text" class="form-control date-picker">
                            </div>
                            <div class="form-note">tanggal format <code>mm/dd/yyyy</code></div>
                        </div>
                        <button id="maintenance_submit" type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
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
