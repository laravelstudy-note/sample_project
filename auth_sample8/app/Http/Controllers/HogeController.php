<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HogeController extends Controller
{
    function show(){
		return view("hoge");
	}
}
