
<!-- Add Admin Modal -->
<div class="modal fade" id="m_edit_permission">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Permission</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form id="f_edit_permission" class="form-validate is-alter" method="post">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label class="form-label" for="emp-id">Nama</label>
                        <div class="form-control-wrap">
                            <input name="name" type="text" class="form-control" id="emp-id" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
