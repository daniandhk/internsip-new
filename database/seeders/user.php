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
            'email' => 'tes@tes',
            'password' => md5('tes'),
            'nama' => 'tes',
            'ttl' => 'tes@tes',
            'telepon' => 'tes@tes',
            'imageName' => 'tes@tes',
        ]);
    }
}
