<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $categories=[
            [
            'category_name'=>'women',
            'category_slug'=>'women',
            'category_image'=>'women1629615990.jpg',
            'parent_id'=>NULL,
            'status'=>'active'
            ],
            [
            'category_name'=>'men',
            'category_slug'=>'men',
            'category_image'=>'men1629696513.jpg',
            'parent_id'=>NULL,
            'status'=>'active'
            ],
            [
            'category_name'=>'shoes',
            'category_slug'=>'shoes',
            'category_image'=>'shoes1629696559.jpg',
            'parent_id'=>NULL,
            'status'=>'active'
            ],
            [
            'category_name'=>'kids',
            'category_slug'=>'kids',
            'category_image'=>'kids1629696594.jpg',
            'parent_id'=>NULL,
            'status'=>'active'
            ],
            [
            'category_name'=>'bag',
            'category_slug'=>'bag',
            'category_image'=>'bag1629696622.jpg',
            'parent_id'=>NULL,
            'status'=>'active'
            ],
            [
            'category_name'=>'watch',
            'category_slug'=>'watch',
            'category_image'=>'watch1629786214.jpg',
            'parent_id'=>3,
            'status'=>'deactive'
            ]
        ];
        foreach($categories as $category)
        {
            Category::create([
                'category_name'=>$category['category_name'],
                'category_slug'=>$category['category_slug'],
                'category_image'=>$category['category_image'],
                'parent_id'=>$category['parent_id'],
                'status'=>$category['status'],
                'created_at'=>now()->toDateTimeString(),
                'updated_at'=>now()->toDateTimeString()
            ]);
        }
    }
}
