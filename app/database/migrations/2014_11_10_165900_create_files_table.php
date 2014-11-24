<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table){
			$table -> increments('id');
			$table -> string('nombre');
			$table -> string('ruta');
			$table -> string('tipo');
			$table -> string('tamano');
			$table -> integer('user_id')->unsigned();
			$table -> foreign('user_id')->references('id')->on('users')->OnDelete('cascade');
			$table -> timestamps();
		});
	} 

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files');
	}

}
