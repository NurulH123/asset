<?php

use App\Models\AssetType;
use App\Models\Brand;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = ['lokasi', 'lokasi 1'];

        foreach ($location as $value) {
            Location::create([
                'name'      => $value,
                'describe'  => $value,
            ]);
        }

        $type = ['tipe', 'tipe 1', 'tipe 2'];

        foreach ($type as $value) {
            AssetType::create([
                'name'      => $value,
                'describe'  => $value,
            ]);
        }

        $brand = ['brand', 'brand 1', 'brand 2'];

        foreach ($brand as $value) {
            Brand::create([
                'name'      => $value,
                'describe'  => $value,
            ]);
        }

        $department = ['department', 'department 1', 'department 2'];

        foreach ($department as $value) {
            Department::create([
                'name'      => $value,
                'describe'  => $value,
            ]);
        }

        $supplier = [
            [
                'name'      => 'CV Pratama',
                'email'     => 'cvpratama@gmail.com',
                'phone'     => '089783894774',
                'city'      => 'Pontianak',
                'address'   => 'Pontianak'
            ],
            [
                'name'      => 'CV Jaya',
                'email'     => 'jaya@gmail.com',
                'phone'     => '089783804774',
                'city'      => 'Malang',
                'address'   => 'Malang'
            ],
        ];

        foreach ($supplier as $value) {
            Supplier::create($value);
        }

        $employee = [
            [
                'name'      => 'Tomi',
                'email'     => 'tomi@gmail.com',
                'phone'     => '089770804774',
                'department_id'   => 1
            ],
            [
                'name'      => 'Susan',
                'email'     => 'susan@gmail.com',
                'phone'     => '089783294774',
                'department_id'   => 2
            ],
        ];

        foreach ($employee as $value) {
            Employee::create($value);
        }
    }
}
