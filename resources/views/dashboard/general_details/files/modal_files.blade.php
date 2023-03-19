<div class="modal fade" tabindex="-1" role="dialog" id="m_files">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Tambah File</h5>
                <hr>
                <div class="nk-country-m_files">
                    <form id="f_files" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ Request::segments()[1] }}">
                        <input type="hidden" name="type" value="{{ Request::segments()[0] }}">
                        <div class="row">
                            <div class="col-sm-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Nama</label>
                                    <div class="input-group">
                                        <input name="name" id="name" type="text" class="form-control" aria-label="Serial" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-1">
                                <label class="form-label">File</label>
                                <div class="form-control-wrap">
                                    <input name="file" type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="my-4 d-flex justify-content-end">
                            <button id="status_submit" type="submit" class="btn btn-success btn-lg">Simpan Data</button>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
