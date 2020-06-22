<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsEntry extends Model
{
	protected $table = 'news_entry';
	
	//belongsTo設定
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
}
