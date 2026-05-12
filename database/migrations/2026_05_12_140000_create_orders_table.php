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
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mitra_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('service_type'); // Changed to string to allow custom input
            $table->text('details');
            $table->string('whatsapp_number')->nullable();
            $table->string('pickup_location');
            $table->string('dropoff_location');
            $table->decimal('bid_price', 12, 2);
            $table->decimal('admin_fee', 12, 2)->default(1000);
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->string('snap_token')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed', 'paid_to_mitra'])->default('pending');
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
