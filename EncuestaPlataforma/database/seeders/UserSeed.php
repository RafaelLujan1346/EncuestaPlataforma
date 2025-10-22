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
            'name'=>'Danny xd',
            'email'=>'Jsjs@gmail.com',
            'password'=>Hash::make('123'),
            'is_admin'=>true,
            'phone'=>'6361099492',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'name'=>'Zico',
            'email'=>'todoestuculpapollo@gmail.com',
            'password'=>Hash::make('bababoy'),
            'is_admin'=>true,
            'phone'=>'6361375304',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
