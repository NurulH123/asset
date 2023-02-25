<script>

    var table = $('#t_asset_type').DataTable({
        ajax: "{{ route('asset-type.index') }}",
        processing: true,
        serverSide: true,
        columns : [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'describe', name: 'describe' },
            { data: 'action', name: 'action' },
        ],
    })

    function checkForm(type) {
        $('#m_general form').attr('id', `f_${type}_general`)
    }

    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
    */
    function add() {
        checkForm('add')
        $('#m_general').modal('show')

        $('#f_add_general').submit(function(e) {
            e.preventDefault()
            $('#m_general').modal('hide')

            var form = $(this);
            $.ajax({
                method: "POST",
                url: "{{ route('asset-type.store') }}",
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
        checkForm('edit')
        $.ajax({
            url: "{{ url('asset-type') }}/" + id +"/edit",
            success: (res) => {
                const form = $('#f_edit_general');
                $('#general_submit').text('Kirim Data')
                $('#m_general').modal('show')

                if (form.find('input[name="id"]').length === 0) {
                    $('#f_edit_general').append(`<input name="id" type="hidden" value="${res.id}">`)
                }

                $('#f_edit_general input[name="name"]').val(res.name)
                $('#f_edit_general input[name="describe"]').val(res.describe)
            }
        })

        // Proses update
        $('#f_edit_general').submit(function(e) {
            e.preventDefault()
            const form = $('#f_edit_general');
            const id = $('#f_edit_general input[name="id"]').val();
            console.log(id);

            $.ajax({
                method: "PATCH",
                url: "{{ url('asset-type') }}/"+id,
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
    }// ============== END ===============
</script>
