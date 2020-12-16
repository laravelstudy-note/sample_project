<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class SearchCondition {
	public $name;
	public $reading;
	public $address;
	public $bloodtype;
	public $enquete1;
	public $enquete2;
	public $enquete3;

	function __construct($input){
		$this->name = (isset($input["name"])) ? $input["name"] : null;
		$this->reading = (isset($input["reading"])) ? $input["reading"] : null;
		$this->address = (isset($input["address"])) ? $input["address"] : null;
		$this->bloodtype = (isset($input["bloodtype"])) ? $input["bloodtype"] : null;
		$this->enquete1 = (isset($input["enquete1"])) ? $input["enquete1"] : null;
		$this->enquete2 = (isset($input["enquete2"])) ? $input["enquete2"] : null;
		$this->enquete3 = (isset($input["enquete3"])) ? $input["enquete3"] : null;
	}
}

class CustomerSearcher {

	private $condition;

	function __construct(SearchCondition $condition){
		$this->condition = $condition;
	}

	function where() {
		return $this;
	}

	/**
	 * 検索実行
	 */
	function search(){
		//クエリーの準備
		$query = Customer::orderBy("id","desc");

		// $ret = Customer::orderBy("id","desc")->get();
		// ↓
		// $query = Customer::orderBy("id","desc");
		// $ret = $query->get();
		// $ret = $query->paginate();

		$condition = $this->condition;

		//名前は部分一致
		if($condition->name){
			$query->where("name","like","%" . $condition->name . "%");
		}

		//ヨミガナは部分一致
		if($condition->reading){
			$query->where("reading","like","%" . $condition->reading . "%");
		}

		//住所は部分一致
		if($condition->address){
			$query->where("address","like","%" . $condition->address . "%");
		}

		//血液型は完全一致
		if($condition->bloodtype){
			$query->where("blood_type","=", $condition->bloodtype);
			// $query->where(function($query) use($value1, $value2){
			// 	$query->where('blood_type', '=', "A")
			// 		  ->orWhere('blood_type', '=', "B");
			// });
		}

		//アンケート項目1〜3は完全一致
		if($condition->enquete1){
			$query->where("enquete1","=", $condition->enquete1);
		}
		if($condition->enquete2){
			$query->where("enquete2","=", $condition->enquete2);
		}
		if($condition->enquete3){
			$query->where("enquete3","=", $condition->enquete3);
		}

		//dd($query->toSql());

		//10件ずつ表示
		$results = $query->paginate(10);

		//ページャーに条件を引き継ぐ
		$results->appends(["search" => $condition]);

		return $results;
	}

}

class CustomerSearchController extends Controller
{
    function search(Request $request){

		//フォームの入力値を受け取る
		$search_input = $request->input("search", []);
		
		//検索条件を作成
		$condition = new SearchCondition($search_input);

		//検索オブジェクトを作る
		$searcher = new CustomerSearcher($condition);
		
		//結果を受け取る
		$results = $searcher->search();

		return view("customer_search", [
			"condition" => $condition,
			"results" => $results
		]);		

	}
}
