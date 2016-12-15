<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();
        DB::table('customers')->insert(['name' => 'Amelia']);
        DB::table('customers')->insert(['name' => 'Max']);
        DB::table('customers')->insert(['name' => 'Kevin']);
        DB::table('customers')->insert(['name' => 'Joe']);
        DB::table('customers')->insert(['name' => 'Diana']);
        DB::table('customers')->insert(['name' => 'Nick']);
        DB::table('customers')->insert(['name' => 'Brett']);
    }
}
