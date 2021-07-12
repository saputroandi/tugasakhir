<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        // [
        //     'user_id' => '1' . date("Ymd",time()) . '001',
        //     'nama' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'email_verifikasi' => true,
        //     'password' => Hash::make('123123'),
        // ],
        [
            'user_id' => '2' . date("Ymd",time()) . '001',
            'nama' => 'andi',
            'email' => 'andi@gmail.com',
            'email_verifikasi' => true,
            'password' => Hash::make('123123'),
        ],
    );
    }
}
