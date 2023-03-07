<script>
    var table = $('#t_assets').DataTable({
        ajax: "{{ route('asset.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'photo',name: 'photo'},
            {data: 'asset_tag',name: 'asset_tag'},
            {data: 'name',name: 'name'},
            {data: 'supplier.name',name: 'supplier.name'},
            {data: 'brand.name',name: 'brand.name'},
            {data: 'location.name',name: 'location.name'},
            {data: 'action',name: 'action'},
        ],
    })
</script>
