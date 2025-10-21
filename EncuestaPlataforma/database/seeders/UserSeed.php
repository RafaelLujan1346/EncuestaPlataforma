<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Jsjs',
            'email'=>'Jsjs@gmail.com',
            'password'=>Hash::make('123'),
            'created_at'=>date("Y-m-d h:m:s")
        ]);
        DB::table('users')->insert([
            'name'=>'Zico',
            'email'=>'todoestuculpapollo@gmail.com',
            'password'=>Hash::make('bababoy'),
            'created_at'=>date("Y-m-d h:m:s")
        ]);
    }
}
