<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');

            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');

            // Relación con roles
            $table->unsignedBigInteger('id_rol');
            $table
                ->foreign('id_rol')
                ->references('id_rol')
                ->on('roles')
                ->onDelete('cascade');

            // Tokens para autenticación futura con Sanctum
            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
