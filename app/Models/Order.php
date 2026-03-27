<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes; // ¡Aquí activamos el borrado lógico!

    protected $fillable = [
        'invoice_number',
        'customer_number',
        'status',
        'process_name',
        'evidence_photo',
    ];
}