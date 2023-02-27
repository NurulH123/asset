<script>

    var table = $('#t_department').DataTable({
        ajax: "{{ route('department.index') }}",
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
        checkInputId()
        $('#m_general .modal-body .title').text('Tambah Departemen')

        $('#m_general form')[0].reset()// Mengkosongkan form sebelum menambahkan data baru
        $('#m_general').modal('show')

        $('#f_add_general').submit(function(e) {
            e.preventDefault()
            $('#m_general').modal('hide')

            var form = $(this);
            $.ajax({
                method: "POST",
                url: "{{ route('department.store') }}",
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
     * |---------------- UPDATE DATA ---------------|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        $('#m_general .modal-body .title').text('Edit Departemen')

        $.ajax({
            url: "{{ url('department') }}/" + id + "/edit",
            success: (res) => {
                const form = $('#f_edit_general');

                $('#general_submit').text('Kirim Data')
                $('#m_general').modal('show')

                checkInputId(res)

                $('#f_edit_general input[name="name"]').val(res.name)
                $('#f_edit_general input[name="describe"]').val(res.describe)
            }
        })
    }

    // $('#m_general').on('show.bs.modal', function() {
        // Proses update
        $('#f_edit_general').submit(function(e) {
            e.preventDefault()
            const form = $('#f_edit_general');
            let id = $('#f_edit_general input[name="id"]').val();

            $.ajax({
                method: "PATCH",
                url: "{{ url('department') }}/" + id,
                data: $(this).serialize(),
                success: (res) => {
                    $('#m_general').modal('hide')
                    table.ajax.reload()
                    form[0].reset()
                }
            })
        })
    // })
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
                    url: "{{ url('department') }}/" + id,
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
