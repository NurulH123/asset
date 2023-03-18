<script>
    const tablePermission = $('#t_permission').DataTable({
        serverSide: true,
        processing: true,
        ajax: "{{ route('settings.list-permission') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'caption', name: 'caption'},
            {data: 'action', name: 'action'},
        ],
    })

    /**
     *  =========================================
     *  =============== PROSES TAMBAH ===========
     *  =========================================
     *
    */
    function addPermission() {
        $('#m_add_permission').modal('show')

        $.ajax({
            url: location.href,
            success: (res) => {
                $('#m_add_permission select[name="group_id"]').html(res)
            }
        })

        $('#m_add_permission form').off('submit').submit(function(e) {
            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: `${location.origin}/settings/add-permission`,
                data: $(this).serialize(),
                success: (res) => {
                    $('#m_add_permission').modal('hide')

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data berhasil ditambahkan'
                    })

                    tablePermission.ajax.reload()
                    $(this)[0].reset()
                },
                error: (err) => {
                    var error = err.responseJSON.errors.name;

                    $('#m_add_permission span.err_name').text(error[0])
                    console.log(err);
                }
            })
        })
    }

    /**
     *  =========================================
     *  =============== PROSES UPDATE ===========
     *  =========================================
     *
    */
    function editPermission(id) {
        $('#m_edit_permission').modal('show')

        $.ajax({
            url: "{{ url('settings/edit-permission') }}/" + id,
            success: (res) => {
                $('#m_edit_permission input[name="id"]').val(res.id)
                $('#m_edit_permission input[name="name"]').val(res.caption)
            }
        })
    }

    $('#m_edit_permission #f_edit_permission').submit(function(e) {
        e.preventDefault()
        const id = $('#f_edit_permission input[name="id"]').val()

        console.log('id :',id);
        $.ajax({
            method: 'PATCH',
            url: "{{ url('settings/update-permission') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {
                $('#m_edit_permission').modal('hide')

                tablePermission.ajax.reload()
                $(this)[0].reset();
            },
            error: (err) => {
                const msg = err.responseJSON.errors

                console.log(err);
                for (const key in msg) {
                    $(`#f_edit_permission span.err_${key}`).text(msg[key][0])
                }
            }
        })
    })


    /**
     *  =========================================
     *  =============== PROSES DELETE ===========
     *  =========================================
     *
    */
    function removePermission(id) {
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
                    url: "{{ url('settings/delete-permission') }}/" + id,
                    success: (res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil dihapus',
                            timer: 2000
                        })

                        tablePermission.ajax.reload()
                    }
                })

            }
        })
   }
</script>
