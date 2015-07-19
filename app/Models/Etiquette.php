<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model {

	public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function operations(){
        return $this->hasMany('App\Models\Operation');
    }
}
