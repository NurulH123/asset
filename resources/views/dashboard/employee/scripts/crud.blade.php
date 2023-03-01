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
    function checkInputId(res = null) {
        console.log('check input id');
        if ($('#m_employee form input[name="id"]').length > 0) {
            $('#m_employee form input[name="id"]').remove()
        }

        if (res !== null) {
            $('#m_employee form').prepend(`<input type="hidden" name="id" value=${res.id}>`)
        }
    }

    // Untuk menghapus option yg memiliki attribut selected
    function netralSelectOption(res = null) {
        var depSelect = $('#m_employee #department_id option')

        for (let i = 0; i < depSelect.length; i++) {// Menetralkan select optional dari attribute selected
            $(depSelect[i]).removeAttr('selected')
        }
        if (res !== null) {
            $(`#m_employee #department_id option[value=${res.department_id}]`).attr("selected", "")
        }
    }

    function checkMethodPost(type = 'edit') {
        const postMethod = $('#m_employee form input[value="PATCH"]')

        if (postMethod.length > 0) {
            $('#m_employee form input[value="PATCH"]').remove()
        }

        if (type === 'edit') {
            $('#m_employee form').prepend('<input type="hidden" name="_method" value="PATCH">')
        }

    }

    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addEmployee() {
        console.log('add func');
        giveIdForm('add')
        netralSelectOption()
        $('#m_employee .modal-body .title').text('Tambah Karyawan')

        $('#m_employee form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_employee').modal('show')
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
                netralSelectOption(res)
                checkInputId(res)
                checkMethodPost('edit')

                $('#employee_submit').text('Kirim Data')
                console.log($('#employee_submit'))
                $('#m_employee').modal('show')

                $("#f_edit_employee input[name='id']").val(res.id)
                $("#f_edit_employee input[name='name']").val(res.name)
                $("#f_edit_employee input[name='department_id']").val(res.department_id)
                $("#f_edit_employee input[name='email']").val(res.email)
                $("#f_edit_employee input[name='phone']").val(res.phone)
            }
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


    /**
     * ==============================================
     * |----------- PROSES MEMASUKKAN DATA ---------|
     * ==============================================
     */

    // Menghapus input id jika formnya tambah
    // Menghapus input method post jika formnya tambah
    $('#m_employee').on('show.bs.modal', function(e) {
        var formAdd = $('#f_add_employee')

        if (formAdd.length > 0 ) {
            checkMethodPost('add')
            checkInputId()
        }
    })

    // Saat form disubmit
    $('#m_employee form').submit(function(e) {
        e.preventDefault()

        const form = $(this)
        const methodPatch = $(this).find('input[value="PATCH"]')

        let id = ""
        let method = "POST"

        if (methodPatch.length) {
            id = $('#f_edit_employee input[name="id"]').val();
            method = "PATCH"
        }

        // Proses pengiriman data ke server
        $.ajax({
            method,
            url: "{{ url('employee') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {
                $('#m_employee').modal('hide')
                table.ajax.reload()
                form[0].reset()
            }
        })


    })

</script>
