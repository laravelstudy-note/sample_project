<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\NewsEntry;

class UserPageController extends Controller
{
	function show(Request $request, $name){
		
		$user = User::where("display_name", $name)->first();
		if(!$user){
			return abort(404);
		}

		$news_list = $user->newsEntry()->orderBy("id", "desc")->paginate(10);

		if($request->has("embed")){

			if($request->input("output") == "json"){
				return response()->json([
					"news_list" => $news_list,
					"user" => $user
				])->header('Access-Control-Allow-Origin', '*');
			}

			$view = view("user_page_embed", [
				"news_list" => $news_list,
				"user" => $user
			]);
			
			return response($view)->header('Access-Control-Allow-Origin', '*');
		}

		return view("user_page", [
			"news_list" => $news_list,
			"user" => $user
		]);

	}

	function showDetail(Request $request, $name, $id){
		
		$news = NewsEntry::find($id);
		if(!$news){
			return abort(404);
		}

		$user = $news->user;

		//display_nameが違う(不正なアクセス！)
		if($user->display_name != $name){
			return abort(404);
		}

		if($request->has("embed")){
			return view("user_news_detail_embed", [
				"news" => $news,
				"user" => $user
			]);
		}

		return view("user_news_detail", [
			"news" => $news,
			"user" => $user
		]);

	}
}
