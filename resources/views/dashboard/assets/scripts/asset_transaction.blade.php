<script>
function checkout(id) {
    $('#m_checkout h5.title').text('Checkout Aset')
    $('#m_checkout #employee_id label').text('Checkout Ke')
    $('#m_checkout #status_date label').text('Tanggal Checkout')
    inputStatus(id)
}

function checkin(id) {
    $('#m_checkout h5.title').text('Check-in Aset')
    $('#m_checkout #employee_id label').text('Check-in Dari')
    $('#m_checkout #status_date label').text('Tanggal Check-in')
    inputStatus(id)
}

function inputStatus(id) {
    $.ajax({
        url: "{{ url('status') }}/" + id,
        success: (res) => {
            $('#m_checkout').modal('show')

            $('#m_checkout input[name="id"]').val(res.id)
            $('#m_checkout input[name="name"]').val(res.name)
            $('#m_checkout input[name="asset_tag"]').val(res.asset_tag)
        }
    })
}


//
$('#m_checkout form').on('submit', this, function(e) {
    e.preventDefault()
    const id = $(this).find('input[name="id"]').val()

    $.ajax({
        method: 'POST',
        url: "{{ url('asset-transaction') }}/" + id,
        data: $(this).serialize(),
        success: (res) => {

            if (res) {
                $('#m_checkout').modal('hide')

                table.ajax.reload()
                $(this)[0].reset()
            }
        },
        error: (err) => {
            console.log(err);
        }
    })
})
</script>
