<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleLogoutController extends Controller
{
	
	function logout(){
		session()->forget("simple_auth");
		return redirect("/");
	}
}
