<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration {

	public function __construct()
	{
		// Get the prefix
		$this->prefix = Config::get('origami.origami_db.prefix', '');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create($this->prefix . 'themes', function(Blueprint $table)
		{

			$table->engine = 'InnoDB';
			$table->increments('id');


			$table->string('name')->unique()->index();
			$table->string('slug')->unique()->index();
			$table->string('version')->nullable()->index();
			$table->boolean('enabled')->nullable()->default('0');
			$table->text('description')->nullable();
			$table->smallInteger('image')->nullable();
			$table->string('designer')->nullable();
			$table->string('website')->nullable();


			$table->softDeletes();
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
		Schema::drop($this->prefix . 'themes');
	}

}
