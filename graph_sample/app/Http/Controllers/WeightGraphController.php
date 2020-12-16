<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;

class WeightGraphController extends Controller
{
    function show(Request $request){

		$avg_weihgt_log = [];
		$max_weihgt_log = [];
		$min_weihgt_log = [];

		//取り出す対象
		$target_days = [
			"202006",
			"202007",
			"202008",
			"202009",
			"202010",
			"202011",
		];

		foreach($target_days as $date_key){
			list($avg, $max, $min) = $this->getWeightLogData($date_key);

			$avg_weihgt_log[] = $avg;
			$max_weihgt_log[] = $max;
			$min_weihgt_log[] = $min;
		}


		return view("weight_graph",[
			"label" => [
				"2020年6月",
				"2020年7月",
				"2020年8月",
				"2020年9月",
				"2020年10月",
				"2020年11月",
			],
			"avg_weight_log" => $avg_weihgt_log,
			"max_weight_log" => $max_weihgt_log,
			"min_weight_log" => $min_weihgt_log,
		]);

	}

	function getWeightLogData($date_key){

		$sum = 0;
		$max = 0;
		$min = 500;

		$logs = WeightLog::where("date_key","like",$date_key . "%")->get();

		foreach($logs as $log){
			$weight = $log->weight;

			$sum += $weight;
			$max = max($max, $weight);
			$min = min($min, $weight);
		}

		$avg = $sum / $logs->count();

		return [
			$avg,
			$max,
			$min
		];

	}
}
