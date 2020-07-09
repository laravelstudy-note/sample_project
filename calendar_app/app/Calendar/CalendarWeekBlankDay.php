<?php

namespace App\Calendar;

use Carbon\Carbon;

/**
 * 余白を出力するためのクラス
 */
class CalendarWeekBlankDay extends CalendarWeekDay {

	function getClassName(){
		return "day-blank";
	}

	/**
	 * @return 
	 */
	function render(){
		return '';
	}
}
