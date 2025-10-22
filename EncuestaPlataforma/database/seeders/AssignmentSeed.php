<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignments')->insert([
            'user_id' => 1,
            'device_id' => 1,
            'assigned_at' => now(),
            'returned_at' => null,
            'purpose' => 'Uso en levantamiento de encuestas de campo 2025.',
            'pdf_path' => null,
            'qr_text' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('assignments')->insert([
            'user_id' => 2,
            'device_id' => 2,
            'assigned_at' => now(),
            'returned_at' => now()->addDays(5),
            'purpose' => 'Uso temporal para capacitación interna.',
            'pdf_path' => null,
            'qr_text' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
