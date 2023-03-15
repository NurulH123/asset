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

    function addPermission() {
        $('#m_permission').modal('show')

        $('#m_permission form').off('submit').submit(function(e) {
            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: `${location.origin}/settings/add-permission`,
                data: $(this).serialize(),
                success: (res) => {
                    $('#m_permission').modal('hide')

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

                    $('#m_permission span.err_name').text(error[0])
                    console.log(err);
                }
            })
        })
    }
</script>
