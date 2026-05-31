<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();           // Solo para admin
            $table->json('experiencia_laboral');
            $table->json('habilidades');
            $table->json('certificaciones')->nullable();
            $table->integer('anos_experiencia')->default(0);
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('personas');
    }
};
