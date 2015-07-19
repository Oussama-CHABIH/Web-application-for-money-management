<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operationper extends Model {

	public function user(){
        return $this->belongsTo('App\Models\User');
    }

     public function etiquette(){
        return $this->belongsTo('App\Models\Etiquette','cin');
    }

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }


}
