<script>
    const link = location.pathname.split('/')

    var tableFiles = $('#t_files').DataTable({
        ajax: {
            url: "{{ route('files.api') }}",
            data: {
                id: link[2],
                type: link[1]
            }
        },
        processing: true,
        serverSide: true,
        columns: [
        {data: 'created_at',name: 'created_at'},
            {data: 'name',name: 'name'},
            {data: 'file',name: 'file'},
            {data: 'action',name: 'action'},
        ],
    })

    function addFile() {
        $('#m_files').modal('show')
    }

    $('#m_files form').submit(function(e) {
        e.preventDefault()

        const form = document.getElementById('f_files')
        const name = $('#f_files input[name="name"]').val()
        const file = $('#f_files input[name="file"]').val()


        // Proses pengiriman data ke server
        $.ajax({
            method: 'POST',
            processData: false,
            contentType: false,
            url: "{{ route('files.store') }}",
            data: new FormData(form),
            success: (res) => {
                $('#m_files').modal('hide')

                tableFiles.ajax.reload()
                form.reset()
            },
            error: (err) => {
                const error = err.responseJSON.errors
                const keys = Object.keys(err.responseJSON.errors);

                for (const i in keys) {
                    let msg = error[keys[i]]

                    $(`#m_files form .err_${keys[i]} span`).text(msg[0])
                }
            }
        })
    })

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
                    url: "{{ url('files') }}/" + id,
                    success: (res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil dihapus',
                            timer: 2000
                        })

                        tableFiles.ajax.reload()
                    }
                })

            }
        })
    }
</script>
