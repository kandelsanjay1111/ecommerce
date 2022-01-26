<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductAttribute;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=array(
            [
            'category_id'=>3,
            'name'=>'polo-tshirt',
            'slug'=>'polo-tshirt',
            'brand'=>'samsung',
            'model'=>'polo',
            'image'=>'polo-tshirt1629697479.png',
            'short_desc'=>'<p>nice product</p>',
            'keywords'=>'polo',
            'technical_specification'=>'<p>2inch 4inch 5inch&nbsp;</p>',
            'warranty'=>'2 year',
            'status'=>'active',
            'is_promo'=>'no',
            'is_featured'=>'no',
            'is_discounted'=>'yes',
            'is_trending'=>'yes'
            ],
            [
            'category_id'=>3,
            'name'=>'t-shirt',
            'slug'=>'t-shirt',
            'brand'=>'samsung',
            'model'=>'shirt',
            'image'=>'t-shirt1629706798.png',
            'short_desc'=>'<p>nice tshirt</p>',
            'keywords'=>'shirt',
            'technical_specification'=>'<p>50 inch chest 20 inch color</p>',
            'warranty'=>'3 month',
            'status'=>'active',
            'is_promo'=>'yes',
            'is_featured'=>'yes',
            'is_discounted'=>'yes',
            'is_trending'=>'yes'
            ],
            [
            'category_id'=>3,
            'name'=>'polo-shirt',
            'slug'=>'polo-shirt',
            'brand'=>'samsung',
            'model'=>'new',
            'image'=>'polo-shirt1629711323.png',
            'short_desc'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisi...',
            'keywords'=>'shirt',
            'technical_specification'=>'<p>2inch 4inch height test</p>',
            'warranty'=>'3 month',
            'status'=>'active',
            'is_promo'=>'yes',
            'is_featured'=>'yes',
            'is_discounted'=>'yes',
            'is_trending'=>'yes'
            ],
            [
            'category_id'=>3,
            'name'=>'black-shirt',
            'slug'=>'black-shirt',
            'brand'=>'samsung',
            'model'=>'shirt',
            'image'=>'black-shirt1629711424.png',
            'short_desc'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>',
            'keywords'=>'polo shirt',
            'technical_specification'=>'<p>30 inch chest, only available here</p>',
            'warranty'=>'2 year',
            'status'=>'active',
            'is_promo'=>'yes',
            'is_featured'=>'yes',
            'is_discounted'=>'yes',
            'is_trending'=>'yes'
            ]
    );
    $attributes=array(
        [
            'product_id'=>1,
            'sku'=>'fghh',
            'image'=>'polo-tshirt1629697479.png',
            'mrp'=>2000,
            'price'=>1700,
            'quantity'=>100,
            'size_id'=>1,
            'color_id'=>4
        ],
        [
            'product_id'=>2,
            'sku'=>'jghfdd',
            'image'=>'t-shirt1629706800.png',
            'mrp'=>800,
            'price'=>700,
            'quantity'=>200,
            'size_id'=>2,
            'color_id'=>1
        ],
        [
            'product_id'=>3,
            'sku'=>'test',
            'image'=>'polo-shirt1629711324.png',
            'mrp'=>1000,
            'price'=>700,
            'quantity'=>100,
            'size_id'=>1,
            'color_id'=>2
        ],
        [
            'product_id'=>4,
            'sku'=>'judykik',
            'image'=>'black-shirt1629711424.png',
            'mrp'=>800,
            'price'=>700,
            'quantity'=>100,
            'size_id'=>1,
            'color_id'=>2
        ]
    );
        for($i=0;$i<4;$i++)
        {
            Product::create($products[$i]);
            ProductAttribute::create($attributes[$i]);
        }
    }
}
