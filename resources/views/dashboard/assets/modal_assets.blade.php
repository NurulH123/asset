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
                                        <input id="name" name="name" type="text" class="form-control" id="default-01">
                                    </div>

                                    <div class="err err_name p-1">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">No Serial</label>
                                    <div class="input-group">
                                        <input id="serial" name="serial" type="text" class="form-control" placeholder="Nomor Serial Barang" aria-label="Serial" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Harga Beli<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input id="cost" name="cost" type="text" class="form-control" id="default-01">
                                    </div>

                                    <div class="err err_cost p-1">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Garansi</label>
                                    <div class="form-control-wrap">
                                        <input id="warranty" name="warranty" type="number" class="form-control" id="default-01">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Beli<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <input id="purchase_date" name="purchase_date" type="text" class="form-control date-picker">

                                        <div class="err err_purchase_date p-1">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="form-note">tanggal format <code>mm/dd/yyyy</code></div>
                                </div>
                                <div class="form-group">
                                    <label for="asset_photo" class="form-label">Gambar</label>
                                    <div class="col-sm-8">
                                        <img
                                            id="photo"
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
                                        <select class="form-control" name="supplier_id" id="supplier_id">
                                            @isset($suppliers)
                                                <option value=""></option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="err err_supplier_id p-1">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Merek<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            @isset($brands)
                                                <option value=""></option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="err err_brand_id p-1">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Lokasi<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-control" name="location_id" id="location_id">
                                            @isset($locations)
                                                <option value=""></option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="err err_location_id p-1">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Tipe Aset<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-control" name="asset_type_id" id="asset_type_id">
                                            @isset($asset_types)
                                                <option value=""></option>
                                                @foreach ($asset_types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <div class="err err_asset_type_id p-1">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Status<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-control" name="status" id="status">
                                            <option value=""></option>
                                            <option value="ready">Siap Digunakan</option>
                                            <option value="pending">Pending</option>
                                            <option value="archived">Diarshipkan</option>
                                            <option value="broken">Rusak</option>
                                            <option value="lost">Hilang</option>
                                            <option value="out_of_repair">Selesai Perbaikan</option>
                                        </select>
                                    </div>

                                    <div class="err err_status p-1">
                                        <span class="text-danger"></span>
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
