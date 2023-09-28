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


        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('referencia')->nullable();
            $table->decimal('precio', 10, 2);
            $table->decimal('peso', 10, 2);
            $table->text('categoria')->nullable();
            $table->BigInteger('stock');
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::create('ventas_productos', function (Blueprint $table) {
            $table->id();
            $table->decimal('cantidad', 10, 2);
            $table->unsignedBigInteger('productos_id');
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
        Schema::dropIfExists('ventas_productos');
    }


};

