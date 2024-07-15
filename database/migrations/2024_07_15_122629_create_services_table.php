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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('company_id')->constrained();
            $table->foreignId('insurance_id')->constrained();
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('plate_id')->constrained();
            $table->foreignId('invoice_id')->nullable()->constrained();
            $table->integer('status')->nullable();
            $table->string('work_order');
            $table->string('vehicle');
            $table->string('vehicle_plate');
            $table->string('origin');
            $table->string('destiny');
            $table->text('observation')->nullable();
            $table->text('history')->nullable();
            $table->string('name_origin')->nullable();
            $table->string('doc_origin')->nullable();
            $table->string('name_destiny')->nullable();
            $table->string('doc_destiny')->nullable();
            $table->double('toll_value')->nullable();
            $table->double('total_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
