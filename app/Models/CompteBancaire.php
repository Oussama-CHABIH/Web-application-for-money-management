<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompteBancaire extends Model {

	public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function operationsbancaire(){
        return $this->hasMany('App\Models\OperationBancaire');
    }

}
