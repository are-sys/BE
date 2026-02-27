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
    Schema::create('mensajes', function (Blueprint $table) {
        $table->id(); // SERIAL en PostgreSQL
        $table->string('departamento');
        $table->text('mensaje');
        $table->timestamps(); // created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
