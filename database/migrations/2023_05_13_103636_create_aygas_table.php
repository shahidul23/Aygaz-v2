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
        Schema::create('aygas', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('name');
            $table->string('phone');
            $table->string('call_source');
            $table->string('location')->nullable();
            $table->text('address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('source')->nullable();
            $table->string('query')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aygas');
    }
};
