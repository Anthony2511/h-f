<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAthleteTrainerTable extends Migration {

	public function up()
	{
		Schema::create('athlete_trainer', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('athlete_id')->unsigned();
			$table->integer('trainer_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('athlete_trainer');
	}
}