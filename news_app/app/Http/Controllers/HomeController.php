<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NewsEntry;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$user = Auth::user();
		$news_list = $user->newsEntry()->orderBy("id", "desc")->paginate(10);
		//$news_list = NewsEntry::where("user_id", Auth::id())->orderBy("id", "desc")->paginate(10);

		//埋め込み用HTMLの組み立て
		$embed_html = [];
		$embed_html[] = '<div style="width: 100%; height: 300px; margin:0; padding: 0px; border: none; max-width: 100%; min-width: 180px; ">';
		$embed_html[] = '<iframe src="'.url('/u/' . $user->display_name . '/?embed').'" style="width:100%;height:100%; border:none;"></iframe>';
		$embed_html[] = '</div>';

		return view("home", [
			"news_list" => $news_list,
			"user" => $user,
			"embed_html" => implode("", $embed_html)
		]);
    }
}
