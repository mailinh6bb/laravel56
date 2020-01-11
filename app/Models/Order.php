<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $guarded = ['*'];
	public function product(){
		return $this->belongsTo('App\Models\Product','or_product_id', 'id');
	}
	public function transaction(){
		return $this->belongsTo('App\Models\Transaction','or_transaction_id', 'id');
	}
}
