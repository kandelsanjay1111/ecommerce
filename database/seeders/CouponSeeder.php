<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::insert([
        [
            'title'=>'January Coupon',
            'code'=>'Jan2021',
            'value'=>'200',
            'status'=>'active',
            'created_at'=>now()->toDateTimeString(),
            'updated_at'=>now()->toDateTimeString()
        ],
        [
            'title'=>'February coupon',
            'code'=>'Feb2021',
            'value'=>'120',
            'status'=>'active',
            'created_at'=>now()->toDateTimeString(),
            'updated_at'=>now()->toDateTimeString()
        ],
        [
            'title'=>'March coupon',
            'code'=>'Mar2021',
            'value'=>'150',
            'status'=>'active',
            'created_at'=>now()->toDateTimeString(),
            'updated_at'=>now()->toDateTimeString()
        ]
    ]);
    }
}
