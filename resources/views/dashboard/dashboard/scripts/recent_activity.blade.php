<script>
$(document).ready(function() {
    const tAsset = $('#t_recent_activity_asset')
    const urlAsset = 'asset-activity'
    const tComponent = $('#t_recent_activity_component')
    const urlComponent = 'component-activity'

    assetDatatables(tAsset, urlAsset)
    componentDatatables(tComponent, urlComponent)

    function assetDatatables(selector, url) {
        var table = selector.DataTable({
            ajax: url,
            processing: true,
            serverSide: true,
            columns: [
                {data: 'status_date',name: 'status_date'},
                {data: 'asset.name',name: 'asset.name'},
                {data: 'employee.name',name: 'employee.name'},
                // {data: 'quantity',name: 'quantity'},
                {data: 'status',name: 'status'},
            ],
        })
    }

    function componentDatatables(selector, url) {
        var table = selector.DataTable({
            ajax: url,
            processing: true,
            serverSide: true,
            columns: [
                {data: 'status_date',name: 'status_date'},
                {data: 'components.name',name: 'component.name'},
                {data: 'assets.name',name: 'asset.name'},
                {data: 'status',name: 'status'},
            ],
        })
    }

})
</script>
