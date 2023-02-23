<script>
//     var table = $('#t_asset_type').DataTable({
//         dom: 'Bfrtip',
//         select: true,
//         pageResize: true,
//         "processing": true,
//         "serverSide": true,
//         lengthMenu: [
//             [ 5,10, 25, 50, 100, -1 ],
//             ['5 rows', '10 rows', '25 rows', '50 rows', '100 rows', 'show all'],
//         ],
//         oLanguage: {
//             sProcessing: 'Sedang diproses...',
//         },
//         "ajax" : "{{ route('asset-type.index') }}",
//         buttons: [
//             {
//                 extend: 'pageLength',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             {
//                 extend: 'print',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             {
//                 extend: 'excel',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//             {
//                 extend: 'pdf',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             },
//         ],
//         columnDefs: [ {
//             visible: false
//         } ],
//         columns : [
//             { data: 'DT_RowIndex', name: 'DT_RowIndex' },
//             { data: 'name', name: 'name' },
//             { data: 'describe', name: 'describe' },
//             { data: 'action', name: 'action' },
//         ],
//     })

    var table = $('#t_asset_type').DataTable({
        ajax: "{{ route('asset-type.index') }}",
        processing: true,
        serverSide: true,
        columns : [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'describe', name: 'describe' },
            { data: 'action', name: 'action' },
        ],
    })

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
                table.ajax.reload()
                form[0].reset()
            }
        })
    })
</script>
