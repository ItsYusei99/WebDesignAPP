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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // 1. Integridad de datos: Relacionamos la orden con el cliente (sustituye al customer_number suelto)
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            
            // 2. Datos de la orden solicitados en el reto
            $table->string('invoice_number')->unique();
            $table->text('delivery_address'); // Faltaba la dirección de entrega
            $table->text('notes')->nullable(); // Faltaba el campo para notas extra
            
            // 3. Estados exactos con mayúsculas y espacios como pide el requerimiento, y con valor por defecto
            $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered'])->default('Ordered');
            
            // 4. Evidencias: El reto pide foto al cargar la unidad y foto al entregar
            $table->string('photo_loading')->nullable();
            $table->string('photo_delivery')->nullable();
            
            // 5. Borrado Lógico
            $table->boolean('is_active')->default(true); // Puedes usar esto para ocultarlas rápido en las vistas
            $table->softDeletes(); // Este es el borrado lógico oficial de Laravel

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};