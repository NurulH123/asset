<script>
    var table = $('#t_asset_maintenance').DataTable({
        ajax: "{{ url('asset-maintenance') }}/" + "{{ $asset->id }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'supplier.name',name: 'supplier.name'},
            {data: 'asset_type.name',name: 'asset_type.name'},
            {data: 'type',name: 'type'},
            {data: 'start_date',name: 'start_date'},
            {data: 'end_date',name: 'end_date'},
        ],
    })
</script>

