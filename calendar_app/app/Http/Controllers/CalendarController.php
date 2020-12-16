<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar\Output\CalendarOutputView;

class CalendarController extends Controller
{
    public function show(){

		$now = time();
		if(isset($_GET["date"])){
			$now = new \Carbon\Carbon($_GET["date"]);
		}
		
		$calendar = new CalendarOutputView($now);

		return view('calendar', [
			"calendar" => $calendar
		]);
	}

	
}
