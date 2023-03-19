
<!-- Add Admin Modal -->
<div class="modal fade" id="m_add_permission">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Permission</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form id="m_add_permission" action="" class="form-validate is-alter">
                    <div class="form-group">
                        <label class="form-label" for="name">Nama</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="py-2">
                            <span class="text-danger err err_name"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Group</label>
                        <div class="form-control-wrap">
                            <select name="group_id" class="form-select js-select2">

                            </select>
                        </div>

                        <div class="py-2">
                            <span class="text-danger err err_group"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
