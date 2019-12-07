<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $fillable=['name','user_id','class_id'];
	
	public function user(){
		return $this->hasOne('App\User');
	}
	
	public function classe(){
		return $this->belongsTo('App\Classe','class_id');
	}
}
