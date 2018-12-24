<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('athlete_trainer', function(Blueprint $table) {
			$table->foreign('athlete_id')->references('id')->on('athletes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('athlete_trainer', function(Blueprint $table) {
			$table->foreign('trainer_id')->references('id')->on('trainers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('athlete_trainer', function(Blueprint $table) {
			$table->dropForeign('athlete_trainer_athlete_id_foreign');
		});
		Schema::table('athlete_trainer', function(Blueprint $table) {
			$table->dropForeign('athlete_trainer_trainer_id_foreign');
		});
	}
}