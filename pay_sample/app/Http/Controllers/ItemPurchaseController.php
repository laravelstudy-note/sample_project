<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemPurchaseController extends Controller
{
    function show(){
		return view("item_detail");
	}

	function buy(){
		return view("purchase_confirm",[
			"payjp_public" => env("PAYJP_PUBLIC_KEY")
		]);
	}

	/**
	 * ここはクレジットカード情報のトークンがPAYJPより返却される
	 */
	function payment(Request $request){
		
		//dd($request->input());

		//予約情報をDBに記録
		//$reserve = null;
		$reservation_id = date("Ymd") . time();

		//PAYJPのトークン
		$token = $request->input("payjp-token");

		//購入処理の実行
		\Payjp\Payjp::setApiKey(env("PAYJP_SECRET_KEY"));

		try {
			$charge = \Payjp\Charge::create([
				"card" => $token,		//受け取ったトークンを渡す
				"amount" => 5000,		//金額
				"currency" => "jpy",	//通貨
				"metadata" => [
					"reservation_id" => $reservation_id
				]
			]);
		} catch(\Exception $e){

			//dd($e);
			//エラーが発生したら前の画面に戻す
			return redirect()->action([__CLASS__, "buy"])->withError(
				"購入処理に失敗しました(" . $e->getMessage() . ")"
			);
		}
		
		//dd($charge);

		//支払いID(これをDBに記録する)
		$charge_id = $charge["id"];
		//$reserve->charge_id = $charge_id;

		return redirect()->action([__CLASS__, "complete"])
			->with("charge_id", $charge_id);	//完了画面に決済IDを渡す
	}

	function complete(Request $request){

		//渡されたチャージIDを取得
		$charge_id = $request->session()->get("charge_id");

		//二回目に表示すると決済IDが消える
		if(!$charge_id){
			return redirect()->route("item");
		}

		return view("purchase_complete", [
			"charge_id" => $charge_id
		]);
	}
}
