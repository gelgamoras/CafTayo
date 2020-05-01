<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name' => 'Everyday Menu',
            'campus_id' => null,
            'dates' => null,
            'status' => 'Active'
        ]);
    }
}
