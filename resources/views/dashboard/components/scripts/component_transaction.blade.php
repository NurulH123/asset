<script>
    function checkout(id) {
        $('#m_checkout_component #employee_id label').text('Checkout Untuk')
        $('#m_checkout_component #status_date label').text('Tanggal Checkout')
        inputStatus(id)
    }

    function inputStatus(id) {
        $.ajax({
            url: "{{ url('component-transaction') }}/" + id,
            success: (res) => {
                $('#m_checkout_component').modal('show')

                $('#m_checkout_component input[name="id"]').val(res.id)
                $('#m_checkout_component input[name="name"]').val(res.name)
                $('#m_checkout_component input[name="quantity"]').attr("placeholder", res.name +" masih tersisa "+res.available_quantity)
            }
        })
    }

    // Menghapus pesan error
    function netralMsg() {
        var errTag = $('#m_checkout_component .err')

        for (let i = 0; i < errTag.length; i++) {
            $(errTag[i]).find('span').text('')
        }
    }

    $('#m_checkout_component').on('show.bs.modal', function(e) {
        netralMsg()
    })

    $('#m_checkout_component form').on('submit', this, function(e) {
        e.preventDefault()
        netralMsg()

        const id = $(this).find('input[name="id"]').val()
        $.ajax({
            method: 'POST',
            url: "{{ url('component-transaction') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {

                if (res) {
                    $('#m_checkout_component').modal('hide')

                    table.ajax.reload()
                    $(this)[0].reset()
                }
            },
            error: (err) => {
                const error = err.responseJSON.errors
                const keys = Object.keys(err.responseJSON.errors);

                for (const i in keys) {
                    let msg = error[keys[i]]

                    $(`#m_checkout_component form .err_${keys[i]} span`).text(msg[0])
                }
            }
        })
    })
</script>
