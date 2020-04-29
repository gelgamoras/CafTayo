<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            'period' => 'Breakfast',
            'start' => '06:00',
            'end' => '09:59',
            'status' => 'active'
        ]);

        DB::table('periods')->insert([
            'period' => 'Lunch',
            'start' => '10:00',
            'end' => '13:59',
            'status' => 'active'
        ]);
        
        DB::table('periods')->insert([
            'period' => 'Snacks',
            'start' => '14:00',
            'end' => '17:59',
            'status' => 'active'
        ]);

        DB::table('periods')->insert([
            'period' => 'Dinner',
            'start' => '18:00',
            'end' => '21:00',
            'status' => 'active'
        ]);
    }
}
