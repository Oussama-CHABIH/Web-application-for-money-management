<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model {

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function etiquette(){
        return $this->belongsTo('App\Models\Etiquette');
    }

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function periodique(){
        return $this->hasOne('App\Models\Operationper');
    }

}
