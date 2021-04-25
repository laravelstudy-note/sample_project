<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {	

		//全件取得
		$response = $this->post('/todo/list');
		$response->assertStatus(200);
		$response->assertJsonFragment([
			"result" => 1
		]);

		//件数を取得
		$count = count($response->json("items"));

		//作成
        $response = $this->post('/todo/create',[ "title" => "タスクを作成"]);
		$response->assertStatus(200);
		$response->assertJsonFragment([
			"result" => 1
		]);

		//作成したものを完了にする
		$id = $response->json("item.id");

		$response = $this->post('/todo/finish/' . $id);
		$response->assertStatus(200);
		$response->assertJsonFragment([
			"result" => 1
		]);
		
		//全件取得
		$response = $this->post('/todo/list');
		$response->assertStatus(200);
		$response->assertJsonFragment([
			"result" => 1
		]);
		$response->assertJsonCount(($count + 1), "items");

		//未完了のものを削除する（新規に追加したものは完了済なので件数があっている）
		$response = $this->post('/todo/clear_finish');
		$response->assertStatus(200);
		$response->assertJsonFragment([
			"result" => 1,
			"count" => $count
		]);


    }
}
