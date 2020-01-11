<?php namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Model;

class Permission extends EntrustPermission
{
	protected $table = 'permissions';
	protected $guarded = ['*'];
	public function roles() {
		return $this->belongsToMany('App\Models\Role');
	}
}
