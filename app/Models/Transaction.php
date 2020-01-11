<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 'transactions';
	protected $guarded = ['*'];
	const STATIC_DONE = 1;
	const STATIC_DEFAULT = 0;
	const STATIC_CANCEL = 1;
	
	public function user(){
		return $this->belongsTo('App\User','tr_user_id', 'id');
	}
}
