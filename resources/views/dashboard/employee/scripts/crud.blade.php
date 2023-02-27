<script>
    var table = $('#t_employee').DataTable({
        ajax: "{{ route('employee.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'name',name: 'name'},
            {data: 'department.name',name: 'department.name'},
            {data: 'email',name: 'email'},
            {data: 'phone',name: 'phone'},
            {data: 'action',name: 'action'},
        ],
    })

    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_employee form').attr('id', `f_${type}_employee`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(data) {
        if (data.form.find('input[name="id"]').length === 1) {
            $('#f_edit_employee input[name="id"]').remove()
        }

        $('#f_edit_employee').append(`<input name="id" type="hidden" value="${data.res.id}">`)
    }


    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addEmployee() {
        giveIdForm('add')
        $('#m_employee .modal-body .title').text('Tambah Karyawan')

        $('#m_employee form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_employee').modal('show')

        // console.log($('#m_employee form'));
        $('#f_add_employee').submit(function(e) {
            e.preventDefault()

            var form = $(this);
            $.ajax({
                method: "POST",
                url: "{{ route('employee.store') }}",
                data: $(this).serialize(),
                success: (res) => {
                    $('#employee_submit').text('Simpan Data')
                    $('#m_employee').modal('hide')

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Telah Tersimpan',
                        timer: 1000,
                    })

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
        $('#m_employee .modal-body .title').text('Edit Karyawan')

        $.ajax({
            url: "{{ url('employee') }}/" + id + "/edit",
            success: (res) => {
                const form = $('#f_edit_employee');
                const data = {form, res}

                $('#employee_submit').text('Kirim Data')
                $('#m_employee').modal('show')

                checkInputId(data)

                for (const key in res) {
                    $(`#f_edit_employee input[name=${key}]`).val(res[key])
                }
            }
        })

        // Proses update
        $('#f_edit_employee').submit(function(e) {
            e.preventDefault()
            const form = $('#f_edit_employee');
            let id = $('#f_edit_employee input[name="id"]').val();
            var url = "{{ url('employee') }}/" + id;

            $.ajax({
                url,
                method: "PATCH",
                data: $(this).serialize(),
                success: (res) => {
                    $('#m_employee').modal('hide')
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
                    url: "{{ url('employee') }}/" + id,
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
