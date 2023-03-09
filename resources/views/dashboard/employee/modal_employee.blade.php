<div class="modal fade" tabindex="-1" role="dialog" id="m_employee">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4"></h5>
                <div class="nk-country-m_employee">
                    <form method="post">
                        @csrf @method('PATCH')
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nama<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input name="name" type="text" class="form-control" id="default-01" placeholder="Masukkan Nama">
                            </div>

                            <div class="err err_name p-1">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Departemen<span class="text-danger">*</span></label>
                            <select class="form-control" name="department_id" id="department_id">
                                <option value="">Pilih Departemen</option>
                                @forelse ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @empty

                                @endforelse
                            </select>

                            <div class="err err_department_id p-1">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Email</label>
                            <div class="form-control-wrap">
                                <input name="email" type="email" class="form-control" id="default-01" placeholder="Masukkan email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">No Hp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">+62</span>
                                </div>
                                <input name="phone" type="number" class="form-control" placeholder="contoh: 81378239xxx" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <button id="employee_submit" type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
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
