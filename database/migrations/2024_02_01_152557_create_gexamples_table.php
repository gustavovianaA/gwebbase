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
        Schema::create('gexamples', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('picture', 255);
            $table->text('gallery');
            $table->string('uploadimagetime',255);
            $table->boolean('truefalse');
            $table->string('price', 255);
            $table->text('details');
            $table->integer('numberinteger'); 
            //$table->date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gexamples');
    }
};
