
<!-- Add Admin Modal -->
<div class="modal fade" id="addAdmin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter">
                    <div class="form-group">
                        <label class="form-label" for="emp-id">Employee ID</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="emp-id" placeholder="e.g.#478" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="admin">Employee List</label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2" id="admin">
                                <option value="default_option">Select one</option>
                                <option value="abu">Abu Bin Istiyaq</option>
                                <option value="iliash">Iliash Hossain</option>
                                <option value="parvej">Parvej Alam</option>
                                <option value="shahjahan">Shahjahan khan</option>
                                <option value="jahangir">Jahangir Alam</option>
                                <option value="mizan">Mizan khan</option>
                                <option value="">Fuad Hossain</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="role">Role</label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2" id="role">
                                <option value="default_option">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="co-admin">Co-Admin</option>
                                <option value="moderator">Moderator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="status">Status</label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2" id="status">
                                <option value="default_option">Select status</option>
                                <option value="admin">Active</option>
                                <option value="co-admin">Inactive</option>
                                <option value="moderator">Suspended</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
