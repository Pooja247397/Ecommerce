<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Admin::create([
            'name'  => 'Pooja Sharma',
            'image' =>  '',
            'email' =>  'admin@gmail.com',
            'password' => Hash::make('123456'),
            
        ]);
    }
}
