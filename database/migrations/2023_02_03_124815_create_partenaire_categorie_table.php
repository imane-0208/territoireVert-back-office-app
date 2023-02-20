<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaire_categorie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partenaire_id');
            $table->unsignedBigInteger('categorie_id');

            $table->foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partenaire_categorie');
    }
};
