<?php namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Admin extends Authenticatable
{
	use Notifiable, EntrustUserTrait;
	
	protected $table = 'admins';
	protected $guarded = [''];

	public function roles() {
		return $this->belongsToMany('App\Models\Role');
	}
	public function getAuthPassword()
    {
     return $this->password;
    }
}
