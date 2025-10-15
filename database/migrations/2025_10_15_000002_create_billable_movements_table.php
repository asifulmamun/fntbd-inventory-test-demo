<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billable_movements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('item_id')->index();
            $table->enum('movement_type', ['in','out']);
            $table->string('purchase_received_from')->nullable();
            $table->string('received_by')->nullable();
            $table->string('received_location')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('vendor_user')->nullable();
            $table->string('po')->nullable();
            $table->string('receiver_company')->nullable();
            $table->string('delivery_by')->nullable();
            $table->string('uom')->nullable();
            $table->decimal('quantity', 18, 4)->default(0);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billable_movements');
    }
};


