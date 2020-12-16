<?php
namespace App\Http\Composers;

use Illuminate\View\View;

class HeaderComposer {

	public  function compose(View $view) {

		$user = 123;

		// $view->with('title', 'あいうえお');
		// $view->with('content', 'Composerの設置場所はどこでもOK');

		$view->with([
			"title" => "あいうえお",
			"content" => "かきくけこ",
		]);

	}

}