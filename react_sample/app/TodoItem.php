<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    protected $table = "todo";
	protected $fillable = ["title"];
}
