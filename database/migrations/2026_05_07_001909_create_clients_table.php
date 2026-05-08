<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('customer_number')->unique(); // El número que usará el cliente para rastrear
            $table->string('name'); // Nombre o Razón Social
            $table->text('fiscal_data'); // Datos fiscales para la factura física
            $table->string('email')->nullable(); 
            $table->string('phone')->nullable();
            $table->text('address'); // Dirección de entrega por defecto
            
            // ¡EL BORRADO LÓGICO! Esto soluciona tu error actual
            $table->softDeletes(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};