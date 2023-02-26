<script>

    var table = $('#t_brand').DataTable({
        ajax: "{{ route('brand.index') }}",
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

    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_general form').attr('id', `f_${type}_general`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(data) {
        if (data.form.find('input[name="id"]').length === 1) {
            $('#f_edit_general input[name="id"]').remove()
        }

        $('#f_edit_general').append(`<input name="id" type="hidden" value="${data.res.id}">`)
    }





    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
    function add() {
        giveIdForm('add')
        $('#m_general .modal-body .title').text('Tambah Merek')

        $('#m_general form')[0].reset()// Mengkosongkan form sebelum menambahkan data baru
        $('#m_general').modal('show')

        $('#f_add_general').submit(function(e) {
            e.preventDefault()
            $('#m_general').modal('hide')

            var form = $(this);
            $.ajax({
                method: "POST",
                url: "{{ route('brand.store') }}",
                data: $(this).serialize(),
                success: (res) => {
                    $('#general_submit').text('Simpan Data')
                    $('#m_general').modal('hide')

                    table.ajax.reload()
                    form[0].reset()
                }
            })
        })
    } // ================= END =================


    /**
     * ==============================================
     * |---------------- UPDATE DATA ------------form---|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        $('#m_general .modal-body .title').text('Edit Merek')

        $.ajax({
            url: "{{ url('brand') }}/" + id + "/edit",
            success: (res) => {
                console.log('edit id:', id);
                const form = $('#f_edit_general');
                const data = {form, res}

                $('#general_submit').text('Kirim Data')
                $('#m_general').modal('show')

                checkInputId(data)

                $('#f_edit_general input[name="name"]').val(res.name)
                $('#f_edit_general input[name="describe"]').val(res.describe)
            }
        })

        // Proses update
        $('#f_edit_general').submit(function(e) {
            e.preventDefault()
            const form = $('#f_edit_general');
            let id = $('#f_edit_general input[name="id"]').val();
            var url = "{{ url('brand') }}/" + id;

            $.ajax({
                url,
                method: "PUT",
                data: $(this).serialize(),
                success: (res) => {
                    $('#m_general').modal('hide')
                    table.ajax.reload()
                    form[0].reset()
                }
            })
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
                    url: "{{ url('brand') }}/" + id,
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
</script>
