<script>
    function checkout(id) {
        $('#m_checkout_component #employee_id label').text('Checkout Untuk')
        $('#m_checkout_component #status_date label').text('Tanggal Checkout')
        inputStatus(id)
    }

    function checkin(id) {
        $('#m_checkout_component #employee_id label').text('Check-in Dari')
        $('#m_checkout_component #status_date label').text('Tanggal Check-in')
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


    //
    $('#m_checkout_component form').on('submit', this, function(e) {
        e.preventDefault()
        const id = $(this).find('input[name="id"]').val()

        $.ajax({
            method: 'POST',
            url: "{{ url('component-transaction') }}/" + id,
            data: $(this).serialize(),
            success: (res) => {

                console.log(res);
                if (res) {
                    $('#m_checkout_component').modal('hide')

                    table.ajax.reload()
                    $(this)[0].reset()
                }
            }
        })
    })
</script>
