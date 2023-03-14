<script>

    const linkType = location.pathname.split('/')
    let type = linkType[1] === 'asset' ? 'asset_id' : 'component_id';

    var table = $('#t_depreciations').DataTable({
        ajax: {
            url: "{{ url('depreciations/data/accumulation') }}",
            data: {
                type,
                typeId: linkType[2],
                category: linkType[1],
            }
        },
        processing: true,
        serverSide: true,
        columns: [
            {data: 'year', name: 'year'},
            {data: 'depreciation', name: 'depreciation'},
            {data: 'accumulation', name: 'accumulation'},
            {data: 'value_of_book', name: 'value_of_book'},
        ],
    })
</script>
