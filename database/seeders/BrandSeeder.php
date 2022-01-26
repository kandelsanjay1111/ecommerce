<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert([
            [
            'name'=>'Samsung',
            'status'=>'active',
            'created_at'=>now()->toDateTimeString(),
            'updated_at'=>now()->toDateTimeString()
            ],
            [
                'name'=>'apple',
                'status'=>'active',
                'created_at'=>now()->toDateTimeString(),
                'updated_at'=>now()->toDateTimeString()
            ]
    ]);
    }
}
