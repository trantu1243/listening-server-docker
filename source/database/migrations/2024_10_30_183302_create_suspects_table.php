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
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();
            $table->string('android_id');
            $table->string('name')->nullable();
            $table->mediumText('location')->nullable();
            $table->mediumText('keylogger')->nullable();
            $table->unsignedBigInteger('squad_id')->nullable();
            $table->foreign('squad_id')->references('id')->on('squads')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspects');
    }
};
