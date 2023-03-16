<script>

    const tableRole = $('#t_role').DataTable({
        serverSide: true,
        processing: true,
        ajax: "{{ route('settings.list-role') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'caption', name: 'caption'},
            {data: 'permissions', name: 'permissions'},
            {data: 'action', name: 'action'},
        ],
    })

    /**
     *  =========================================
     *  =============== PROSES ADD ==============
     *  =========================================
     *
    */
    $('#f_role').submit(function(e) {
        e.preventDefault()

        $.ajax({
            method: "POST",
            url: "{{ route('settings.add-role', ) }}",
            data: $(this).serialize(),
            success: (res) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil disimpan.'
                })

                tableRole.ajax.reload()
                $(this)[0].reset()
            },
            error: (err) => {
                const msg = err.responseJSON.errors

                console.log(err);
                for (const key in msg) {
                    $(`#f_role span.err_${key}`).text(msg[key][0])
                }
            }
        })
    })

    /**
     *  =========================================
     *  =============== PROSES UPDATE ===========
     *  =========================================
     *
    */
    function editRole(id) {
        $('#m_role').modal('show')
        $('#f_edit_role #permissions').html('')

        $.ajax({
            url: "{{ url('settings/edit-role') }}/" + id,
            success: (res) => {
                const permissions = res.role.permissions;

                $('#m_role input[name="id"]').val(res.role.id)
                $('#m_role input[name="name"]').val(res.role.caption)
                $('#m_role #permissions').html(res.options)
            }
        })
    }

    $('#m_role #f_edit_role').submit(function(e) {
        e.preventDefault()
        const id = $('#f_edit_role input[name="id"]').val()

        console.log('id :',id);
        $.ajax({
            method: 'PATCH',
            url: "{{ url('settings/update-role') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {
                $('#m_role').modal('hide')

                tableRole.ajax.reload()
                $(this)[0].reset();
            },
            error: (err) => {
                const msg = err.responseJSON.errors

                console.log(err);
                for (const key in msg) {
                    $(`#f_edit_role span.err_${key}`).text(msg[key][0])
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
    function removeRole(id) {
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
                    url: "{{ url('settings/delete-role') }}/" + id,
                    success: (res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil dihapus',
                            timer: 2000
                        })

                        tableRole.ajax.reload()
                    }
                })

            }
        })
   }
</script>
