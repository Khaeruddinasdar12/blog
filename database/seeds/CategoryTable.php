<?php

use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            'nama'  => 'Teknologi'
        ]);

        DB::table('categories')->insert([
            'nama'  => 'Bisnis'
        ]);

        DB::table('categories')->insert([
            'nama'  => 'Startup'
        ]);
    }
}
