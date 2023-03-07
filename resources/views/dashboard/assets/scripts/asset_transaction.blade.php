<script>
function checkout(id) {
    $.ajax({
        url: "{{ url('checkout') }}/" + id,
        success: (res) => {
            $('#m_checkout').modal('show')

            $('#m_checkout input[name="id"]').val(res.id)
            $('#m_checkout input[name="name"]').val(res.name)
            $('#m_checkout input[name="asset_tag"]').val(res.asset_tag)
        }
    })
}

function checkin(id) {
    $.ajax({
        url: "{{ url('checkin') }}/" + id,
        success: (res) => {
            $('#m_checkout').modal('show')

            $('#m_checkout input[name="id"]').val(res.id)
            $('#m_checkout input[name="name"]').val(res.name)
            $('#m_checkout input[name="asset_tag"]').val(res.asset_tag)
        }
    })
}

// $('#m_checkout').on('show.bs.modal', function(e) {
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
            }
        })
    })
// })
</script>
