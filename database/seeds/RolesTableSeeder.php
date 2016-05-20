<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rolNombre' => 'General',
        ]);
        DB::table('roles')->insert([
            'rolNombre' => 'Top',
        ]);
        DB::table('roles')->insert([
            'rolNombre' => 'Jungla',
        ]);
        DB::table('roles')->insert([
            'rolNombre' => 'Mid',
        ]);
        DB::table('roles')->insert([
            'rolNombre' => 'ADC',
        ]);
        DB::table('roles')->insert([
            'rolNombre' => 'Support',
        ]);
    }
}
