<script>
    var table = $('#t_asset_transaction').DataTable({
        ajax: "{{ url('asset-transaction') }}/" + "{{ $asset->id }}/show",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'employee.name',name: 'employee.name'},
            {data: 'employee.department.name',name: 'employee.department.name'},
            {data: 'asset.type.name',name: 'asset.type.name'},
            {data: 'category',name: 'category'},
            {data: 'status_date',name: 'status_date'},
        ],
    })
</script>
