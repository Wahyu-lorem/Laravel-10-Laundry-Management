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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('paket', 30);
            $table->string('hari', 20);
            $table->string('tanggal', 50);
            $table->integer('kilogram');
            $table->decimal('dp', 10, 2)->nullable();
            $table->decimal('sisa', 10, 2)->nullable();
            $table->decimal('harga', 10, 2);
            $table->tinyInteger('status')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
