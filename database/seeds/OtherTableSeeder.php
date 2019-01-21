<?php

use Illuminate\Database\Seeder;

class OtherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                'name' => 'Exterior',
                'category' => 'exterior',
                'status' => 1,
                'serial' => 1,
            ]);
        DB::table('categories')->insert([
                'name' => 'Interior',
                'category' => 'interior',
                'status' => 1,
                'serial' => 2,
            ]);
        DB::table('categories')->insert([
                'name' => '2D Plan',
                'category' => '2d_plan',
                'status' => 1,
                'serial' => 3,
            ]);
        DB::table('categories')->insert([
                'name' => '3D Plan',
                'category' => '3d_plan',
                'status' => 1,
                'serial' => 4,
            ]);
    }
}
