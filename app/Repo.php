<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
	protected $table = 'repos';

	protected $guarded = [];

	protected $dates = ['created_at', 'updated_at'];
}
