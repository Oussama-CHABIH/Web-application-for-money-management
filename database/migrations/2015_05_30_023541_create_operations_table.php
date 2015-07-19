<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type_dr');
			$table->date('date');
			$table->text('description');
			$table->string('mode_paiement');
			$table->float('montant');
			$table->timestamps();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('etiquette_id')->unsigned()->nullable();
            $table->foreign('etiquette_id')->references('id')->on('etiquettes');

            $table->integer('categorie_id')->unsigned()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operations');
	}

}
