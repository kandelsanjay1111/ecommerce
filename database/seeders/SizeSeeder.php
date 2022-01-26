<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::insert(
            [
                [
                    'size'=>'XL',
                    'status'=>'active'
                ],
                [
                    'size'=>'XXL',
                    'status'=>'active',
                ],
                [
                    'size'=>'L',
                    'status'=>'active',
                ]
            ]
        );
    }
}
