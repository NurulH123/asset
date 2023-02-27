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
            $('#m_general form').append(`<input name="id" type="hidden" value="${res.id}">`)
        }
    }

    /**
     *
     * Menegecek setiap modal m_general muncul, apakah ada method PATCH.
     * Jika tidak ada dan formnya adalah edit, maka tambahkan method PATCH
     *
     * */
    $('#m_general').on('show.bs.modal', function(e) {
        const method = $(`#m_general form input[value="PATCH"]`);

        if (method.length > 0) {
            $('#m_general form input[name="_method"]').remove()
        }

        if ($('#f_edit_general').length > 0) {
            $('#f_edit_general').prepend('<input type="hidden" name="_method" value="PATCH">')
        }
    })
</script>
