<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('aplicaciones_insumos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cultivo_id')->nullable();
        $table->unsignedBigInteger('animal_id')->nullable();

        $table->date('fecha');
        $table->string('producto');
        $table->string('dosis');

        $table->timestamps();

        // Relaciones opcionales
        $table->foreign('cultivo_id')->references('id')->on('cultivos')->onDelete('cascade');
        $table->foreign('animal_id')->references('id')->on('animales')->onDelete('cascade');
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplicaciones_insumos');
    }
};
