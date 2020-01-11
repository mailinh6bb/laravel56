<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	protected $guarded = [''];
	const STATUS_PUBLIC = 1;
	const STATUS_PRAVATE = 0;
	const HOT_ON = 1;
	const HOT_OFF = 0;
	
	protected $status = [
		1 => [
			'name' => 'Public',
			'class' => 'label-info'
		],
		0 => [
			'name' => 'Private',
			'class' =>'label-danger'
		]

	];
	protected $hot = [
		1 => [
			'name' => 'Nổi Bật',
			'class' => 'label-success'
		],
		0 => [
			'name' => 'Không',
			'class' =>'label-default'
		]

	];
	public function getStatus(){
		return array_get($this->status, $this-> pro_active);
	}
	public function getHot(){
		return array_get($this->hot, $this-> pro_hot);
	}
	public function category(){
		return $this->belongsTo('App\Models\Category','pro_category_id', 'id');
	}
}
