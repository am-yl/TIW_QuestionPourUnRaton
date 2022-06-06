<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionnairesIdForQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function(Blueprint $table) {
            $table->foreignId('questionnaire_id')->constrained()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function(Blueprint $table) {
            $table->dropForeign('questions_questionnaire_id_foreign');
            $table->dropColumn('questionnaire_id');
        });
    }
}
