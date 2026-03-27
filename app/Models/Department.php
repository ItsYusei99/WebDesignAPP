<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // Indicamos qué campos se pueden llenar masivamente
    protected $fillable = ['name'];

    // Relación: Un departamento tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
