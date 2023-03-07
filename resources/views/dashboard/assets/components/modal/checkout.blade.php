<div class="modal fade" tabindex="-1" role="dialog" id="m_checkout">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4"></h5>
                <div class="nk-country-m_checkout">
                    <form method="post">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Nama</label>
                                    <div class="form-control-wrap">
                                        <input disabled name="name" type="text" class="form-control" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Aset Tag</label>
                                    <div class="input-group">
                                        <input disabled name="asset_tag" type="text" class="form-control" aria-label="Serial" aria-describedby="basic-addon1" id="asset_tag">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Checkout ke<span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="employee_id" id="employee_id">
                                        @isset($employees)
                                            @foreach ($employees as $employee)
                                                <option value=""></option>
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="status_date" class="form-label">Tanggal Checkout</label>
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
