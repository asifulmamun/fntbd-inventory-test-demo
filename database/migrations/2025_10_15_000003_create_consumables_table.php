<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consumables', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('consumable_id')->index();
            $table->string('name');
            $table->string('manufacturer')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('fnt_pm')->nullable();
            $table->string('vendor_pm')->nullable();
            $table->string('dismantle_site_id')->nullable();
            $table->string('project_name')->nullable();
            $table->string('send_to')->nullable();
            $table->string('send_by')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('receiver')->nullable();
            $table->string('uom')->nullable();
            $table->decimal('quantity', 18, 4)->default(0);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['active','dismantled','sent'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consumables');
    }
};


