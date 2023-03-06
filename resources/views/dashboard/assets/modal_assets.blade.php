<div class="modal fade" tabindex="-1" role="dialog" id="m_asset">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4"></h5>
                <div class="nk-country-m_asset">
                    <form method="post" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Nama<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input name="name" type="text" class="form-control" id="default-01" placeholder="Masukkan Nama">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">No Serial</label>
                                    <div class="input-group">
                                        <input name="serial" type="text" class="form-control" placeholder="Nomor Serial Barang" aria-label="Serial" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Harga Beli<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input name="cost" type="text" class="form-control" id="default-01" placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Garansi</label>
                                    <div class="form-control-wrap">
                                        <input name="warranty" type="number" class="form-control" id="default-01" placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Tanggal Beli<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input name="date" type="date" class="form-control" id="default-01" placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="asset_photo" class="form-label">Gambar</label>
                                    <div class="col-sm-8">
                                        <img
                                            id="showPhoto"
                                            class="card-img-top img-fluid rounded avatar-lg"
                                            src="{{ asset('/assets/images/noimage.png') }}"
                                            alt="Card image cap"
                                        >
                                    </div>
                                    <div class="col-sm-10 mt-3">
                                        <input type="file" name="asset_photo" id="asset_photo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Pemasok<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="supplier_id" id="supplier_id">
                                            @isset($suppliers)
                                            @foreach ($suppliers as $supplier)
                                                    <option value=""></option>
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Merek<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="brand_id" id="brand_id">
                                            @isset($brands)
                                                @foreach ($brands as $brand)
                                                    <option value=""></option>
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Lokasi<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="location_id" id="location_id">
                                            @isset($locations)
                                                @foreach ($locations as $location)
                                                    <option value=""></option>
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Tipe Aset<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="asset_type_id" id="asset_type_id">
                                            @isset($asset_types)
                                                @foreach ($asset_types as $type)
                                                    <option value=""></option>
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Status<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="status" id="status">
                                            <option value="">Pilih Status</option>
                                            <option value="ready">Siap Digunakan</option>
                                            <option value="pending">Pending</option>
                                            <option value="archived">Diarshipkan</option>
                                            <option value="broken">Rusak</option>
                                            <option value="lost">Hilang</option>
                                            <option value="out_maintenance">Rusak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="describe">Deskripsi</label>
                                    <div class="form-control-wrap">
                                        <textarea name="describe" rows="5" class="form-control no-resize" id="describe"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-4 d-flex justify-content-end">
                            <button id="employee_submit" type="submit" class="btn btn-warning btn-lg">Simpan Data</button>
                        </div>
                    </form>
                    <hr>
                    <div class="note mt-3">
                        <b>Note :</b>
                        <p><span class="text-danger">*</span> = Wajib Diisi</p>
                    </div>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
