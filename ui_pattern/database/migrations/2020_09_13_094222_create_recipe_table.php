<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_recipe', function (Blueprint $table) {
			$table->id();
			
			//レシピ名
			$table->string('name');

			//URL
			$table->string('url')->nullable();

			//説明
			$table->text('description')->nullable();

			//user_id: usersとの連携用
			$table->foreignId('user_id')->constrained("users");

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
        Schema::dropIfExists('user_recipe');
    }
}
