<script>
    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_asset form').attr('id', `f_${type}_asset`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(res = null) {
        console.log('check input id');
        if ($('#m_asset form input[name="id"]').length > 0) {
            $('#m_asset form input[name="id"]').remove()
        }

        if (res !== null) {
            $('#m_asset form').prepend(`<input type="hidden" name="id" value=${res.id}>`)
        }
    }

    // Untuk menghapus option yg memiliki attribut selected
    function netralSelectOption(val = null, key = null) {
        var depSelect = $(`#m_asset #${key} option`)

        for (let i = 0; i < depSelect.length; i++) {// Menetralkan select optional dari attribute selected
            $(depSelect[i]).removeAttr('selected')
        }
        if (val !== null) {
            $(`#m_asset #${key} option[value=${val}]`).attr("selected", "")
            $(`#m_asset #${key}`).attr("value", val)
        }
    }

    function checkMethodPost(type = 'edit') {
        const postMethod = $('#m_asset form input[value="PATCH"]')

        if (postMethod.length > 0) {
            $('#m_asset form input[value="PATCH"]').remove()
        }

        if (type === 'edit') {
            $('#m_asset form').prepend('<input type="hidden" name="_method" value="PATCH">')
        }

    }

    // Menghapus pesan error 
    function netralMsg() {
        var errTag = $('#m_asset .err')

        for (let i = 0; i < errTag.length; i++) {
            $(errTag[i]).find('span').text('')
        }
    }

    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addAsset() {
        giveIdForm('add')
        netralSelectOption()
        $('#m_asset .modal-body .title').text('Tambah Aset')

        $('#m_asset form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_asset').modal('show')
    } // ================= END =================


    /**
     * ==============================================
     * |---------------- UPDATE DATA ---------------|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        $('#m_asset .modal-body .title').text('Edit Aset')

        $.ajax({
            url: "{{ url('asset') }}/" + id + "/edit",
            success: (res) => {
                checkInputId(res)
                checkMethodPost('edit')

                $('#asset_submit').text('Kirim Data')
                $('#m_asset').modal('show')

                for (const key in res) {
                    let target = $(`#m_asset form #${key}`)[0]

                    if (target !== undefined && target.tagName === 'SELECT') {
                        netralSelectOption(res[key], key)
                    } else if (target !== undefined && target.tagName === 'IMG') {
                        $(`#m_asset #${key}`).attr('src', res.photo)
                    } else {
                        $(target).val(res[key])
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
                    url: "{{ url('asset') }}/" + id,
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
    $('#m_asset').on('show.bs.modal', function(e) {
        netralMsg()
        var formAdd = $('#f_add_asset')

        if (formAdd.length > 0 ) {
            checkMethodPost('add')
            checkInputId()
        }

    })

    // Saat form disubmit
    $('#m_asset form').submit(function(e) {
        e.preventDefault()

        const form = $(this)[0]
        const methodPatch = $(this).find('input[value="PATCH"]')

        let id = ""
        let method = "POST"

        if (methodPatch.length) {
            id = $('#f_edit_asset input[name="id"]').val();
            // Jika mengirimkan data dg FormData dan method ajaxnya adl PATCH, maka datanya akan selalu kosong
            // method = "PATCH"
        }

        // Proses pengiriman data ke server
        $.ajax({
            method,
            processData: false,
            contentType: false,
            url: "{{ url('asset') }}/" + id,
            data: new FormData(form),
            success: (res) => {
                $('#m_asset').modal('hide')
                table.ajax.reload()

                form.reset()
            },
            error: (err) => {
                const error = err.responseJSON.errors
                const keys = Object.keys(err.responseJSON.errors);

                for (const i in keys) {
                    let msg = error[keys[i]]

                    $(`#m_asset form .err_${keys[i]} span`).text(msg[0])
                }
            }
        })
    })

</script>
