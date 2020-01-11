<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comment';
	protected $guarded = ['*'];
	public function user(){
		return $this -> belongsto('App\User', 'idUser', 'id');
	}
	public function article(){
		return $this -> belongsto('App\Models\Artile', 'idArticle', 'id');
	}
	public function reply(){
		return $this-> hasMany('App\Models\ReplyComment', 'rep_comment_id', 'id');
	}
}
