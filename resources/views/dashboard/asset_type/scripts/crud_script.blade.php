@include('scripts_general')

<script>
    var table = $('#t_asset_type').DataTable({
        ajax: "{{ route('asset-type.index') }}",
        processing: true,
        serverSide: true,
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'describe',
                name: 'describe'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
    })


    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
    function add() {
        giveIdForm('add')
        checkMethodPost('add')
        checkInputId()
        $('#m_general .modal-body .title').text('Tambah Tipe Aset')

        $('#m_general form')[0].reset()// Mengkosongkan form sebelum menambahkan data baru
        $('#m_general').modal('show')

    } // ================= END =================


    /**
     * ==============================================
     * |---------------- UPDATE DATA ---------------|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        checkMethodPost('edit')

        $('#m_general .modal-body .title').text('Edit Tipe Aset')

        $.ajax({
            url: "{{ url('asset-type') }}/" + id + "/edit",
            success: (res) => {
                const form = $('#f_edit_general');

                $('#general_submit').text('Kirim Data')
                $('#m_general').modal('show')

                checkInputId(res)

                $('#f_edit_general input[name="id"]').val(res.id)
                $('#f_edit_general input[name="name"]').val(res.name)
                $('#f_edit_general input[name="describe"]').val(res.describe)

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
                    url: "{{ url('asset-type') }}/" + id,
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


    // Proses update
    $('#m_general form').submit(function(e) {
        e.preventDefault()
        const form = $(this)
        const methodPatch = $(this).find('input[value="PATCH"]')

        let id = ""
        let method = "POST"

        console.log(form);
        console.log(methodPatch);
        // console.log(methodPatch);
        if (methodPatch.length) {
            id = $('#f_edit_general input[name="id"]').val();
            method = "PATCH"
        }

        $.ajax({
            method,
            url: "{{ url('asset-type') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {
                $('#m_general').modal('hide')
                table.ajax.reload()
                form[0].reset()
            },
            error: (err) => {
                const error = err.responseJSON.errors
                const keys = Object.keys(err.responseJSON.errors);

                for (const i in keys) {
                    let msg = error[keys[i]]

                    $(`#m_general form .err_${keys[i]} span`).text(msg[0])
                }
            }
        })
    })
</script>
