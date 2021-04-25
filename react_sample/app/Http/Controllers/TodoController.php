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
				"error" => "タイトルが入力されていません"
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

	function finish(Request $request, $id){

		$item = TodoItem::find($id);

		if(!$item){
			return response()->json([
				"result" => 0,
				"error" => "指定のIDは存在しません"
			]);
		}

		//todo_status = 1にすると完了済にする
		$item->todo_status = 1;
		$item->save();

		return response()->json([
			"result" => 1
		]);

	}

	function clearFinish(Request $request){

		//完了済(todo_status=1)のものを削除 
		TodoItem::where("todo_status", 1)->delete();

		//件数を取得する
		$count = TodoItem::count();

		return response()->json([
			"result" => 1,
			"count" => $count
		]);

	}
}
