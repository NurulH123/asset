<script>

    const tableRole = $('#t_role').DataTable({
        serverSide: true,
        processing: true,
        ajax: "{{ route('settings.list-role') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'caption', name: 'caption'},
            {data: 'caption', name: 'caption'},
            {data: 'action', name: 'action'},
        ],
    })

    $('#m_role').submit(function(e) {
        e.preventDefault()

        $.ajax({
            method: "POST",
            url: "{{ route('settings.add-role') }}",
            data: $(this).serialize(),
            success: (res) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil disimpan.'
                })

                $(this)[0].reset()
            }
        })
    })
</script>
