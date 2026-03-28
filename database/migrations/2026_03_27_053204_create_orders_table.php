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
        $table->string('invoice_number')->unique();
        $table->string('customer_number');
        $table->enum('status', ['ordered', 'in_process', 'in_route', 'delivered']);
        $table->string('process_name')->nullable();
        $table->string('evidence_photo')->nullable();
        
        $table->boolean('is_active')->default(true); 
        $table->softDeletes(); 

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