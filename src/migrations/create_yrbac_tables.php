<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateYrbacTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('auth_item', function (Blueprint $table) {
            $table->string('name', 64)->unique();
            $table->tinyInteger('type')->default('1');
            $table->text('description');
            $table->text('bizrule');
            $table->text('data');

            $table->primary('name');
            $table->timestamps();
        });

        Schema::create('auth_item_child', function (Blueprint $table) {
            $table->string('parent');
            $table->string('child');

            $table->primary(['parent', 'child']);
            $table->foreign('parent')->references('name')->on('auth_item')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('child')->references('name')->on('auth_item')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('auth_assignment', function (Blueprint $table) {
            $table->string('itemname', 64);
            $table->bigInteger('user_id');
            $table->text('bizrule');
            $table->text('data');

            $table->primary(['itemname', 'user_id']);
            $table->foreign('itemname')->references('name')->on('auth_item')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('auth_item_child');
        Schema::drop('auth_assignment');
        Schema::drop('auth_item');
	}

}
