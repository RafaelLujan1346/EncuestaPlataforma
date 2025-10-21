<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispositivoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dispositivos')->insert([
            'nombre'=>'Vivo y36',
            'tipo'=>'Celular',
            'marca'=>'Vivo',
            'modelo'=>'V2247',
            'created_at'=>date("Y-m-d h:m:s")
        ]);
        DB::table('dispositivos')->insert([
            'nombre'=>'Cubot p80',
            'tipo'=>'Celular',
            'marca'=>'Cubot',
            'modelo'=>'P80',
            'created_at'=>date("Y-m-d h:m:s")
        ]);
    }
}
