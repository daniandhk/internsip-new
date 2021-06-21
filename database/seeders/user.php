<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'tes@gmail.com',
            'password' => md5('tes'),
            'nama' => 'Testing User',
            'ttl' => 'Malang, 7 April 1999',
            'telepon' => '081220436175',
            'imageName' => 'default-ava.png',
        ]);
    }
}
