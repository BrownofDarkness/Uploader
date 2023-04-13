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
        Schema::create('certificat', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('departement');
            $table->string('commune');
            $table->string('arrondissement');
            $table->string('town');
            $table->string('longitude');
            $table->string('latitude');
            $table->text('description');
            $table->string('hauteur');
            $table->string('propriétaire');
            $table->string('adress');
            $table->string('file')->nullable();
            $table->dateTime('delivrate_at');
            $table->dateTime('expire_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificat');
    }
};
