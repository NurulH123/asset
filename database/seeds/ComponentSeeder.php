<?php

use App\Models\Component;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assets = ['RAM', 'Gear', 'Memori HP', 'Flashdisk'];
        $status = ['ready', 'pending', 'lost', 'archived', 'broken','out_of_repair'];

        foreach ($assets as $value) {
            Component::create([
                'name'              => $value,
                'serial'            => date('YmdHis'),
                'supplier_id'       => rand(1, 2),
                'brand_id'          => rand(1, 2),
                'location_id'       => rand(1, 2),
                'asset_type_id'     => rand(1, 2),
                'warranty'          => rand(1, 5),
                'cost'              => rand(1000000, 5000000),
                'quantity'          => 5,
                'available_quantity'=> 5,
                'status'            => rand(0, 5),
                'purchase_date'     => '2023-'.'-'.rand(1, 12).'-'.rand(1, 30),
            ]);
        }
    }
}
