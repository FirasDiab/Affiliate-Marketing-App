<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Firas',
                'email' => 'firas@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('firas123'),
                'image' => 'no_image',
                'user_role' => 1,
                'referral-link' => null,
                'referral-by' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }
}
