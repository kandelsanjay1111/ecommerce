<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::insert([
            [
            'title'=>'WRISTWATCH COLLECTION',
            'subtitle'=>'Lorem ipsum dolor sit amet, consectetur adipisicin...',
            'image'=>'WRISTWATCH COLLECTION1629696976.jpg',
            'status'=>'active',
            'created_at'=>now()->toDateTimeString()
        ],
        [
            'title'=>'JEANS COLLECTION',
            'subtitle'=>'Lorem ipsum dolor sit amet, consectetur adipisicin...',
            'image'=>'JEANS COLLECTION1629697218.jpg',
            'status'=>'active',
            'created_at'=>now()->toDateTimeString()
        ]]);
    }
}
