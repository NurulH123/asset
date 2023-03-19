<?php
namespace App\Http\Controllers\Dashboard\Traits\Dashboard;

use App\Models\Asset;
use App\Models\AssetType;
use App\Http\Controllers\Dashboard\Traits\Dashboard\DashboardProperties;

/**
 *
 */
trait GroupingData
{
    use DashboardProperties;

    protected function assetByType()
    {
        $type = AssetType::pluck('name', 'id')->toArray();

        return $this->processGrouping($type, 'asset_type_id');
    }

    protected function assetByStatus()
    {
        $status = [
            'ready'         => 'Siap Digunakan',
            'pending'       => 'Pending',
            'archived'      => 'Diarsipkan',
            'broken'        => 'Rusak',
            'lost'          => 'Hilang',
            'out_maintenance'=> 'Selesai Maintenance',
        ];

        return $this->processGrouping($status, 'status');
    }

    private function processGrouping($data, $column)
    {
        $items = [[]];
        $colors = [];
        $asset = Asset::all()->groupBy($column)->toArray();

        foreach ($asset as $key => $value) {
            $item = [];
            $item[$data[$key]] = count($value);

            array_push($colors, '#'.$this->random_color());
            $items = array_merge($item, $items);
        }

        array_pop($items);

        return [
            'data'      => $items,
            'colors'    => $colors,
        ];
    }
}
