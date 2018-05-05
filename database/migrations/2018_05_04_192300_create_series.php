<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('titre_original');
            $table->string('titre_alternatif');
            $table->year('annee');
            $table->string('studio');
            $table->string('auteur');
            $table->integer('episode')->unsigned()->default(0);
            $table->integer('oav')->unsigned()->default(0);
            $table->integer('films')->unsigned()->default(0);
            $table->integer('bonus')->unsigned()->default(0);
            $table->integer('scan')->unsigned()->default(0);
            $table->integer('light-novel')->unsigned()->default(0);
            $table->integer('visual-novel')->unsigned()->default(0);
            $table->longText('synopsis');
            $table->longText('staff');
            $table->string('type')->default('Animes');
            $table->boolean('publication')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
