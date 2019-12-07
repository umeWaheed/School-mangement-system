<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //
	protected $fillable=['name','section_id','teacher_id'];
	
	public function section(){
		return $this->belongsTo('App\Section','section_id');
	}
	
	public function teacher(){
		return $this->belongsTo('App\Teacher','teacher_id');
	}
	
	public function student(){
		return $this->hasMany('App\Student');
	}
}
