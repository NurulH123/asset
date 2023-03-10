@push('style_css')
    <style>
        #t_details th{
            width: 15%;
            background-color: #C1F4C5;
        }
    </style>
@endpush

<div class="row">
    <div class="col-md-12">
        <div class="my-4">
            <div class="p-1">
                <h4><b>Detail Informasi</b></h4>
            </div>
        </div>
        <table id="t_details" class="table table-hover table-bordered">
            <tr>
                <th>Tipe Aset</th>
                <td>{{ $asset->type->name }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $asset->status }}</td>
            </tr>
            <tr>
                <th>Serial</th>
                <td>{{ $asset->serial }}</td>
            </tr>
            <tr>
                <th>Merek</th>
                <td>{{ $asset->brand->name }}</td>
            </tr>
            <tr>
                <th>Tanggal Beli</th>
                <td>{{ $asset->purchase_date }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{ $asset->cost }}</td>
            </tr>
            <tr>
                <th>Garansi</th>
                <td>{{ $asset->warranty }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $asset->location->name }}</td>
            </tr>
            <tr>
                <th>Aset</th>
                <td>{{ $asset->supplier->name }}</td>
            </tr>
            <tr>
                <th>Diskripsi</th>
                <td>{{ $asset->describe }}</td>
            </tr>
        </table>
    </div>
</div>
