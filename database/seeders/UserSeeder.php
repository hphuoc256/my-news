<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'nhphuoc256@gmail.com',
            'password' => bcrypt('123456'),
            'username' => 'Nguyễn Hữu Phước',
            'firstname' => 'Nguyễn',
            'lastname' => 'Phước',
            'birthday' => '1998-02-06',
            'address' => 'Ho Chi Minh',
            'phone' => '0334287256',
            'gender' => 1,
            'level' => 1,
            'avatar' => 'avatar.png'
        ]);
    }
}
