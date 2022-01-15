<?php

use Illuminate\Database\Seeder;

class RegisterViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('register_views')->insert(
            [
                'count' => 0,
            ]
        );
    }
}
