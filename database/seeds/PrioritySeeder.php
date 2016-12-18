<?php

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->delete();
        DB::table('priorities')->insert(['name' => 'Urgent']);
        DB::table('priorities')->insert(['name' => 'High']);
        DB::table('priorities')->insert(['name' => 'Normal']);
        DB::table('priorities')->insert(['name' => 'Low']);
    }
}
