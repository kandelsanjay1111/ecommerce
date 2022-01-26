<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\CustomeSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\CouponSeeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            CustomerSeeder::class,
            ColorSeeder::class,
            BrandSeeder::class,
            CouponSeeder::class,
            SizeSeeder::class,
            BannerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
