@include('scripts_general')

<script>
    var table = $('#t_maintenance').DataTable({
        ajax: "{{ route('maintenance.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'asset.asset_tag', name: 'asset.asset_tag' },
            { data: 'asset.name', name: 'asset.name' },
            { data: 'supplier.name', name: 'supplier.name' },
            { data: 'asset.type.name', name: 'asset.type.name' },
            { data: 'start_date', name: 'start_date' },
            { data: 'end_date', name: 'end_date' },
            { data: 'action', name: 'action' },
        ],
    })


    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_maintenance form').attr('id', `f_${type}_maintenance`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(res = null) {
        if ($('#m_maintenance form input[name="id"]').length > 0) {
            $('#m_maintenance form input[name="id"]').remove()
        }

        if (res !== null) {
            $('#m_maintenance form').prepend(`<input type="hidden" name="id" value=${res.id}>`)
        }
    }

    // Untuk menghapus option yg memiliki attribut selected
    function netralSelectOption(res=null, key=null) {
        var depSelect = $(`#m_maintenance #${key} option`)

        for (let i = 0; i < depSelect.length; i++) {// Menetralkan select optional dari attribute selected
            $(depSelect[i]).removeAttr('selected')
        }
        if (res !== null) {
            $(`#m_maintenance #${key} option[value=${res[key]}]`).attr("selected", "")
        }
    }

    function checkMethodPost(type = 'edit') {
        const postMethod = $('#m_maintenance form input[value="PATCH"]')

        if (postMethod.length > 0) {
            $('#m_maintenance form input[value="PATCH"]').remove()
        }

        if (type === 'edit') {
            $('#m_maintenance form').prepend('<input type="hidden" name="_method" value="PATCH">')
        }

    }

    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addMaintenance() {
        giveIdForm('add')
        $('#m_maintenance .modal-body .title').text('Tambah Pemeliharaan')

        $('#m_maintenance form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_maintenance').modal('show')
    } // ================= END =================


    /**
     * ==============================================
     * |---------------- UPDATE DATA ------------form---|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        $('#m_maintenance .modal-body .title').text('Edit Pemeliharaan')

        $.ajax({
            url: "{{ url('maintenance') }}/" + id + "/edit",
            success: (res) => {
                checkInputId(res)
                checkMethodPost('edit')

                $('#maintenance_submit').text('Kirim Data')
                $('#m_maintenance').modal('show')

                console.log(res);
                for (const key in res) {
                    let select = $(`#m_maintenance form select[name=${key}]`)

                    if (select.length) {
                        netralSelectOption(res, key);
                    } else {
                        $(`#f_edit_maintenance input[name=${key}]`).val(res[key])
                    }
                }
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
                    url: "{{ url('maintenance') }}/" + id,
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
    $('#m_maintenance').on('show.bs.modal', function(e) {
        var formAdd = $('#f_add_maintenance')

        if (formAdd.length > 0 ) {
            checkMethodPost('add')
            checkInputId()
        }
    })

    // Saat form disubmit
    $('#m_maintenance form').submit(function(e) {
        e.preventDefault()

        const form = $(this)
        const methodPatch = $(this).find('input[value="PATCH"]')

        let id = ""
        let method = "POST"

        if (methodPatch.length) {
            id = $('#f_edit_maintenance input[name="id"]').val();
            method = "PATCH"
        }

        // Proses pengiriman data ke server
        $.ajax({
            method,
            url: "{{ url('maintenance') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {
                $('#m_maintenance').modal('hide')
                table.ajax.reload()
                form[0].reset()
            }
        })
    })
</script>
