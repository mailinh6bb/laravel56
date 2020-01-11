<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\EntrustRole;
class Role extends  EntrustRole
{
	protected $table = 'roles';
	protected $guarded = ['*'];
	public function admins() {
		return $this->belongsToMany('App\Models\Admin');
	}
	public function permissions() {
		return $this->belongsToMany('App\Models\Permission', 'permission_role', 'role_id', 'permission_id');
	}
	
}
