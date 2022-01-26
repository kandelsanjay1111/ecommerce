<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=['red','black','blue','white'];
        foreach($colors as $color)
        {
            Color::create([
                'color'=>$color,
                'status'=>'active',
                'created_at'=>now()->toDateTimeString(),
                'updated_at'=>now()->toDateTimeString()
            ]);
        }
    }
}
