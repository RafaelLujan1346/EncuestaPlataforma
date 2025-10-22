<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'brand',
        'model',
        'status',
        'notes',
    ];

    // Relación con asignaciones
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
