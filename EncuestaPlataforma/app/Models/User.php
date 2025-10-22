<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación con asignaciones
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
