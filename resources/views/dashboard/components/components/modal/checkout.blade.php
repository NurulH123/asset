<div class="modal fade" tabindex="-1" role="dialog" id="m_checkout_component">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Checkout Komponent</h5>
                <hr>
                <div class="nk-country-m_checkout_component">
                    <form method="post">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Komponen</label>
                                    <div class="form-control-wrap">
                                        <input disabled name="name" type="text" class="form-control" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-1" id="employee_id">
                                <label class="form-label" for="default-01">Checkout Untuk<span class="text-danger">*</span></label>
                                    <select class="form-select" name="asset_id">
                                    @isset($assets)
                                        <option value=""></option>
                                        @foreach ($assets as $asset)
                                            <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Jumlah</label>
                                    <div class="input-group">
                                        <input name="quantity" id="quantity" type="text" class="form-control" aria-label="Serial" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-1" id="status_date">
                                <label class="form-label">Tanggal Checkout</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-calendar-alt"></em>
                                    </div>
                                    <input name="status_date" type="text" class="form-control date-picker">
                                </div>
                                <div class="form-note">tanggal format <code>mm/dd/yyyy</code></div>
                            </div>
                        </div>

                        <div class="my-4 d-flex justify-content-end">
                            <button id="status_submit" type="submit" class="btn btn-success btn-lg">Kirim Data</button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
