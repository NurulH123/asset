<div class="card-inner pt-0">
    <div class="nk-block-head">
        <div class="my-3">
            <div class="card-inner card-bordered">
                <div class="card-head">
                    <div class="title">
                        <p><strong>Tambah Role</strong></p>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <form id="m_role" action="{{ route('settings.add-role') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <div class="form-control-wrap">
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Permission</label>
                                    <div class="form-control-wrap">
                                        <select name="permissions[]" class="form-select js-select2" multiple="multiple" data-placeholder="Pilih Permission">
                                            <option value=""></option>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->caption }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-md btn-primary">Tambah Role</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row g-gs">
        <div class="col-lg-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h5 class="card-title">List Role</h5>
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <table id="t_role" width="100%" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Permission</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
