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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['atm', 'cdm', 'tst', 'kc', 'kcs', 'kcp_sb', 'kcp_dl', 'kcps']);
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('cp');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('open_hour');
            $table->string('close_hour');
            $table->integer('queue')->default(0);
            $table->float('rate')->default(0);
            $table->boolean('is_deleted')->default(false);
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
