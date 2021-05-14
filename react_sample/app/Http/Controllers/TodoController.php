<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoItem;

class TodoController extends Controller
{

	function show(Request $request){
		return view("app");
	}

	function all(Request $request){

		$allItems = TodoItem::all();

		return response()->json([
			"result" => 1,
			"items" => $allItems
		]);

	}

    function create(Request $request){

		$title = $request->input("title");
		if(!$title){
			return response()->json([
				"result" => 0,
				"error" => "タイトルが入力されていません",
				"req" => $request->input()
			]);
		}

		$item = TodoItem::create([
			"title" => $title
		]);

		return response()->json([
			"result" => 1,
			"item" => $item
		]);
	}

	function finish(Request $request){

		$title = $request->input("title");
		$value = $request->input("value", 1);
		
		//探す
		$item_list = TodoItem::where("title","=",$title)->get();
		
		if(!$item_list){
			return response()->json([
				"result" => 0,
				"error" => "指定のタスクはありません"
			]);
		}

		//todo_status = 1にすると完了済にする
		foreach($item_list as $item){
			$item->todo_status = (int)$value;
			$item->save();
		}

		$allItems = TodoItem::all();

		return response()->json([
			"result" => 1,
			"items" => $allItems,
		]);

	}

	function clearFinish(Request $request){

		//完了済(todo_status=1)のものを削除 
		TodoItem::where("todo_status", 1)->delete();

		//件数を取得する
		$count = TodoItem::count();

		$allItems = TodoItem::all();

		return response()->json([
			"result" => 1,
			"count" => $count,
			"items" => $allItems,
		]);

	}
}


