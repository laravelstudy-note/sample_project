<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class SampleFormController extends Controller
{

	private $formItems = ["name", "title", "body"];

	private $validator = [
		"name" => "required|string|max:100",
		"title" => "required|string|max:100",
		"body" => "required|string|max:100"
	];

	function show(Request $request){
		return view("form");
	}

	function post(Request $request){
		
		$input = $request->only($this->formItems);
		
		$validator = Validator::make($input, $this->validator);

		if($validator->fails()){
			return redirect()->action("SampleFormController@show")
				->withInput()
				->withErrors($validator);
		}

		//セッションに書き込む
		$request->session()->put("form_input", $input);

		return redirect()->action("SampleFormController@confirm");
	}

	function confirm(Request $request){

		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("SampleFormController@show");
		}

		return view("form_confirm",["input" => $input]);
	}

	function send(Request $request){

		//セッションから値を取り出す
		$input = $request->session()->get("form_input");

		//戻るボタンが押された時
		if($request->has("back")){
			return redirect()->action("SampleFormController@show")
				->withInput($input);
		}

		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("SampleFormController@show");
		}

		//ここでメールを送信するなどを行う

		//セッションを空にする
		$request->session()->forget("form_input");

		return redirect()->action("SampleFormController@complete");
	}

	function complete(){	
		return view("form_complete");
	}
}
