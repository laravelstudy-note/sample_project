<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
			$table->id();
			
			// - 連番
			// 連番は記録しないでも良い
			
			// - 氏名
			$table->string("name");

			// - 氏名（カタカナ）
			$table->string("reading")->nullable();

			// - 氏名（ローマ字）
			$table->string("reading_alphabet")->nullable();

			// - 性別
			$table->string("gender")->nullable();

			// - 電話番号
			$table->string("telephone")->nullable();

			// - メールアドレス
			$table->string("mailaddress")->nullable();

			// - 郵便番号
			$table->string("zipcode")->nullable();

			// - 住所
			$table->string("address")->nullable();

			// - 生年月日
			$table->string("birthday")->nullable();

			// - 年齢
			$table->integer("age")->nullable();

			// - 出身地
			$table->string("hometown")->nullable();

			// - 血液型
			$table->string("blood_type")->nullable();

			// - アンケート項目１
			$table->integer("enquete1")->nullable();

			// - アンケート項目２
			$table->integer("enquete2")->nullable();

			// - アンケート項目３
			$table->integer("enquete3")->nullable();

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
        Schema::dropIfExists('customer');
    }
}
