<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationBancairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operation_bancaires', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type_bancaire');
			$table->float('montant_bancaire');
			$table->timestamps();

            $table->integer('cb_id')->unsigned()->nullable();
            $table->foreign('cb_id')->references('id')->on('compte_bancaires');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operation_bancaires');
	}

}
