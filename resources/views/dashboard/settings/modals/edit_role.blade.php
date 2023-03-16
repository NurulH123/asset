
<!-- Edit Admin Modal -->
<div class="modal fade" id="m_role">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form id="f_edit_role" class="form-validate is-alter" method="post">
                    @csrf @method('PATCH')

                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <div class="form-control-wrap">
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="mt-1">
                                <span class="text-danger err err_name"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Permission</label>
                                <div class="form-control-wrap">
                                    <select id="permissions" name="permissions[]" class="form-select js-select2" multiple="multiple" data-placeholder="Pilih Permission">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="mt-1">
                                    <span class="text-danger err err_permission"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
