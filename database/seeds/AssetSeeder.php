<?php

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assets = ['Laptop', 'HP', 'PC', 'AC', 'Mobil'];
        $status = ['ready', 'pending', 'lost', 'archived', 'broken','out_of_repair'];

        foreach ($assets as $value) {
            Asset::create([
                'asset_tag'     => 'TIP'.date('ymHis').rand(10,99),
                'name'          => $value,
                'serial'        => date('YmdHis'),
                'supplier_id'   => rand(1, 2),
                'brand_id'      => rand(1, 2),
                'location_id'   => rand(1, 2),
                'asset_type_id' => rand(1, 2),
                'warranty'      => rand(1, 5),
                'cost'          => rand(5000000, 10000000),
                'status'        => $status[rand(0, 5)],
                'purchase_date' => '2023-'.'-'.rand(1, 12).'-'.rand(1, 30),
            ]);
        }
    }
}
