<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupeQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_questionnaire', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groupe_id')->onDelete('cascade');
            $table->integer('questionnaire_id')->onDelete('cascade');
            $table->integer('resultat')->nullable();
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
        Schema::dropIfExists('groupe_questionnaire');
    }
}
