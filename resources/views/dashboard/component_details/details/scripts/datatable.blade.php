<script>
    var tableDetailComponent = $('#t_component_details').DataTable({
        ajax: "{{ url('component-transaction') }}/" + "{{ $component->id }}/show",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'status_date',name: 'status_date'},
            {data: 'assets.name',name: 'assets.name'},
            {data: 'quantity',name: 'quantity'},
            {data: 'checkin',name: 'checkin'},
        ],
    })

    function checkin(id) {
        $.ajax({
            url: "{{ url('checkin-component') }}/" + id,
            success: (res) => {
                $('#m_checkin').modal('show')

                $('#t_checkin input[name="id"]').val(res.id)
                $('#t_checkin select[name="asset_id"]').val(res.asset_id)
                $(`#t_checkin select[name="asset_id"] option[value=${res.asset_id}]`).attr('seleced')

                $('#t_checkin select[name="component_id"]').val(res.component_id)
                $(`#t_checkin select[name="component_id"] option[value=${res.component_id}]`).attr('seleced')
            }
        })
    }

    $('#m_checkin form').submit(function(e) {
        e.preventDefault()
        var form = $(this)
        var transactionId = $('#t_checkin input[name="id"]').val()

        var asset_id = $('#t_checkin select[name="asset_id"]').val();
        var component_id = $('#t_checkin select[name="component_id"]').val()
        var quantity = $('#t_checkin input[name="quantity"]').val()
        var status_date = $('#t_checkin input[name="status_date"]').val()


        $.ajax({
            method: "POST",
            url: "{{ url('checkin-component') }}/" + transactionId,
            data: {asset_id, component_id, quantity, status_date},
            success: (res) => {
                $('#m_checkin').modal('hide')

                tableDetailComponent.ajax.reload()
                form[0].reset()
            }
        })
    })
</script>
