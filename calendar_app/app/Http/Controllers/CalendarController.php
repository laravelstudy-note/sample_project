<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar\Output\CalendarOutputView;

class CalendarController extends Controller
{
    public function show(){
		
		$calendar = new CalendarOutputView(time());

		return view('calendar', [
			"calendar" => $calendar
		]);
	}

	
}
