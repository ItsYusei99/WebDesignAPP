<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes; // Esto habilita el borrado lógico en la base de datos

    // ¡VITAL! Le dice a Laravel qué campos sí puede guardar
    protected $fillable = [
        'client_id',
        'invoice_number',
        'delivery_address',
        'status',
        'photo_loading',
        'photo_delivery'
    ];

    // Relación: Una orden pertenece a un cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}