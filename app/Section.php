<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
	protected $fillable = ['name'];
	
	public function classe()
    {
        return $this->hasMany('App\Classe','id');
    }
}
