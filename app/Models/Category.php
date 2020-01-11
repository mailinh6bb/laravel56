<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $guarded = [''];
	const STATUS_PUBLIC = 1;
	const STATUS_PRAVATE = 0;
	const HOME = 0;
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
	protected $home = [
		1 => [
			'name' => 'Hiện',
			'class' => 'label-info'
		],
		0 => [
			'name' => 'Ẩn',
			'class' =>'label-danger'
		]
	];
	public function getStatus(){
		return array_get($this->status, $this-> c_active);
	}
	public function getHome(){
		return array_get($this->home, $this-> c_home);
	}
	public function products(){
		return $this->hasMany('App\Models\Product','pro_category_id', 'id');
	}

}
