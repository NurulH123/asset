<script>
    var table = $('#t_supplier').DataTable({
        ajax: "{{ route('supplier.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'name',name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'phone',name: 'phone'},
            {data: 'city',name: 'city'},
            {data: 'address',name: 'address'},
            {data: 'action',name: 'action'},
        ],
    })

    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_supplier form').attr('id', `f_${type}_supplier`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(res = null) {
        if ($('#m_supplier form input[name="id"]').length === 1) {
            $('#f_edit_supplier input[name="id"]').remove()
        }

        if (res !== null) {
            $('#f_edit_supplier').append(`<input name="id" type="hidden" value="${res.id}">`)
        }
    }

    function checkMethodPost(type = 'edit') {
        const postMethod = $('#m_supplier form input[value="PATCH"]')

        if (postMethod.length > 0) {
            $('#m_supplier form input[value="PATCH"]').remove()
        }

        if (type === 'edit') {
            $('#m_supplier form').prepend('<input type="hidden" name="_method" value="PATCH">')
        }

    }

    // Menghapus pesan error
    function netralMsg() {
        var errTag = $('#m_supplier .err')

        for (let i = 0; i < errTag.length; i++) {
            $(errTag[i]).find('span').text('')
        }
    }


    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addSupplier() {
        giveIdForm('add')
        $('#m_supplier .modal-body .title').text('Tambah Pemasok')

        $('#m_supplier form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_supplier').modal('show')

    } // ================= END =================


    /**
     * ==============================================
     * |---------------- UPDATE DATA ------------form---|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        $('#m_supplier .modal-body .title').text('Edit Pemasok')

        $.ajax({
            url: "{{ url('supplier') }}/" + id + "/edit",
            success: (res) => {
                const form = $('#f_edit_supplier');

                $('#supplier_submit').text('Kirim Data')
                $('#m_supplier').modal('show')

                checkInputId(res)
                checkMethodPost('edit')

                for (const key in res) {
                    $(`#f_edit_supplier input[name=${key}]`).val(res[key])
                }
            }
        })

    }
    // ============ END ==============

    /**
     * ==============================================
     * |---------------- DELETE DATA ---------------|
     * ==============================================
     */
    function remove(id) {
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda yakin akan menghapus?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: `Tidak`,
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: "{{ url('supplier') }}/" + id,
                    success: (res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil dihapus',
                            timer: 2000
                        })

                        table.ajax.reload()
                    }
                })

            }
        })
    } // ============== END ===============


    /**
     * ==============================================
     * |----------- PROSES MEMASUKKAN DATA ---------|
     * ==============================================
     */

    // Menghapus input id jika formnya tambah
    // Menghapus input method post jika formnya tambah
    $('#m_supplier').on('show.bs.modal', function(e) {
        netralMsg()
        var formAdd = $('#f_add_supplier')

        if (formAdd.length > 0 ) {
            checkMethodPost('add')
            checkInputId()
        }
    })

    // Saat form disubmit
    $('#m_supplier form').submit(function(e) {
        e.preventDefault()

        const form = $(this)
        const methodPatch = $(this).find('input[value="PATCH"]')

        let id = ""
        let method = "POST"

        if (methodPatch.length) {
            id = $('#f_edit_supplier input[name="id"]').val();
            method = "PATCH"
        }

        // Proses pengiriman data ke server
        $.ajax({
            method,
            url: "{{ url('supplier') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {
                $('#m_supplier').modal('hide')
                table.ajax.reload()
                form[0].reset()
            },
            error: (err) => {
                const error = err.responseJSON.errors
                const keys = Object.keys(err.responseJSON.errors);

                for (const i in keys) {
                    let msg = error[keys[i]]

                    $(`#m_supplier form .err_${keys[i]} span`).text(msg[0])
                }
            }
        })
    })
</script>
