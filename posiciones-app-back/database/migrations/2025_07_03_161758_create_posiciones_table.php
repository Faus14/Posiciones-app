<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posiciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEmpresa');
            $table->unsignedBigInteger('idProducto');
            $table->date('fechaEntregaInicio');
            $table->string('moneda');
            $table->decimal('precio', 15, 2);
            $table->timestamps();


            $table->foreign('idEmpresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posiciones');
    }
};
