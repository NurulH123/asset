<script>
    console.log(location.origin);
    console.log(location.href);
    // var table = $('#t_asset_type').DataTables({
    //     ajax: location.href,
    //     serverSide: true,
    //     processing: true,
    // })

    $('#m_asset_type form').submit(function(e) {
        e.preventDefault()
        $('#m_asset_type').modal('hide')

        var form = $(this);
        console.log(form);

        $.ajax({
            method: "POST",
            url: "{{ route('asset-type.store') }}",
            data: $(this).serialize(),
            success: res => {
                console.log(res);
                $('#m_asset_type').modal('hide')
                form[0].reset()
            }
        })
    })
</script>
