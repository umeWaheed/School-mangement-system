<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
	protected $fillable=['name','user_id'];
	
	public function user(){
		return $this->hasOne('App\User');
	}
	
	public function classe(){
		return $this->hasMany('App\Classe','id');
	}
	
}
