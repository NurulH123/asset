<script>
    var table = $('#t_supplier').DataTable({
        ajax: "{{ route('supplier.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'name',name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'phone',name: 'phone'},
            {data: 'city',name: 'city'},
            {data: 'address',name: 'address'},
            {data: 'action',name: 'action'},
        ],
    })

    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_supplier form').attr('id', `f_${type}_supplier`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(data) {
        if (data.form.find('input[name="id"]').length === 1) {
            $('#f_edit_supplier input[name="id"]').remove()
        }

        $('#f_edit_supplier').append(`<input name="id" type="hidden" value="${data.res.id}">`)
    }





    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addSupplier() {
        giveIdForm('add')
        $('#m_supplier .modal-body .title').text('Tambah Pemasok')

        $('#m_supplier form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_supplier').modal('show')

        // console.log($('#m_supplier form'));
        $('#f_add_supplier').submit(function(e) {
            e.preventDefault()

            var form = $(this);
            $.ajax({
                method: "POST",
                url: "{{ route('supplier.store') }}",
                data: $(this).serialize(),
                success: (res) => {
                    $('#supplier_submit').text('Simpan Data')
                    $('#m_supplier').modal('hide')

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
        $('#m_supplier .modal-body .title').text('Edit Pemasok')

        $.ajax({
            url: "{{ url('supplier') }}/" + id + "/edit",
            success: (res) => {
                const form = $('#f_edit_supplier');
                const data = {form, res}

                $('#supplier_submit').text('Kirim Data')
                $('#m_supplier').modal('show')

                checkInputId(data)

                for (const key in res) {
                    $(`#f_edit_supplier input[name=${key}]`).val(res[key])
                }
            }
        })

        // Proses update
        $('#f_edit_supplier').submit(function(e) {
            e.preventDefault()
            const form = $('#f_edit_supplier');
            let id = $('#f_edit_supplier input[name="id"]').val();
            var url = "{{ url('supplier') }}/" + id;

            $.ajax({
                url,
                method: "PATCH",
                data: $(this).serialize(),
                success: (res) => {
                    $('#m_supplier').modal('hide')
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
                    url: "{{ url('supplier') }}/" + id,
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
