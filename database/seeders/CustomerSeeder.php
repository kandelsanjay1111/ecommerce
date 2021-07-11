<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name'=>'Sanjay Kandel',
            'email'=>'kandelsanjay1111@gmail.com',
            'password'=>bcrypt('kandelsanjay'),
            'mobile'=>'9844880283',
            'address'=>'Kathmandu, Nepal',
            'city'=>'Kathmandu',
            'state'=>'Bagmati',
            'zip'=>'2233',
            'company'=>'My company',
            'status'=>'active'
        ]);
    }
}
