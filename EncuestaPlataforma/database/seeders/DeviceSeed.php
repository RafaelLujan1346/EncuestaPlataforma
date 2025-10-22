<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('devices')->insert([
            'name' => 'Vivo Y36',
            'type' => 'Celular',
            'brand' => 'Vivo',
            'model' => 'V2247',
            'status' => 'disponible',
            'notes' => 'Dispositivo nuevo, entregado sin funda',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('devices')->insert([
            'name' => 'Cubot P80',
            'type' => 'Celular',
            'brand' => 'Cubot',
            'model' => 'P80',
            'status' => 'disponible',
            'notes' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
