<script>
    var table = $('#asset_component').DataTable({
        ajax: "{{ url('asset-component') }}/" + "{{ $asset->id }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'components.name',name: 'components.name'},
            {data: 'components.type.name',name: 'components.type.name'},
            {data: 'components.supplier.name',name: 'components.supplier.name'},
            {data: 'components.location.name',name: 'components.location.name'},
            {data: 'components.status',name: 'components.status'},
            {data: 'current_quantity',name: 'current_quantity'},
        ],
    })
</script>
