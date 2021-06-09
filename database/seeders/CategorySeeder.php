<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Macbook Air' ,
             'slug' => 'macbook-air'],
            ['name' => 'Macbook Pro' ,
             'slug' => 'macbook-pro'],
            ['name' => 'Macbook Retina' ,
             'slug' => 'macbook-retina'],
        ]);
    }
}
