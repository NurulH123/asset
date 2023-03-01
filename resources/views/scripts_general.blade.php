<script>
    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_general form').attr('id', `f_${type}_general`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(res = null) {
        const inputId = $('#m_general form input[name="id"]');

        if (inputId.length > 0) {
            $('#m_general form input[name="id"]').remove()
        }

        if (res !== null) {
            $('#m_general form').prepend(`<input name="id" type="hidden" value="${res.id}">`)
        }
    }

    // Check method post
    function checkMethodPost(type = 'edit') {
        const postMethod = $('#m_general form input[value="PATCH"]')

        if (postMethod.length > 0) {
            $('#m_general form input[value="PATCH"]').remove()
        }

        if (type === 'edit') {
            $('#m_general form').prepend('<input type="hidden" name="_method" value="PATCH">')
        }

    }

    /**
     *
     * Menegecek setiap modal m_general muncul, apakah ada method PATCH.
     * Jika tidak ada dan formnya adalah edit, maka tambahkan method PATCH
     * Menghapus input id jika formnya tambah
     * Menghapus input method post jika formnya tambah
     *
     * */

    $('#m_general').on('show.bs.modal', function() {
        var formAdd = $('#f_add_general')

        if (formAdd.length > 0 ) {
            checkMethodPost('add')
            checkInputId()
        }
    })
</script>
