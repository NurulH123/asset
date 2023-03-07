<script>
    var table = $('#t_component').DataTable({
        ajax: "{{ route('component.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'photo',name: 'photo'},
            {data: 'name',name: 'name'},
            {data: 'type.name',name: 'type.name'},
            {data: 'brand.name',name: 'brand.name'},
            {data: 'quantity',name: 'quantity'},
            {data: 'qty_available',name: 'qty_available'},
            {data: 'action',name: 'action'},
        ],
    })
</script>
