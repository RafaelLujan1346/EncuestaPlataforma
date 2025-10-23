<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device_id',
        'assigned_at',
        'returned_at',
        'purpose',
        'pdf_path',
        'qr_text',
    ];
    protected $casts = [
        'assigned_at' => 'datetime',
        'returned_at' => 'datetime',
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con dispositivo
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
