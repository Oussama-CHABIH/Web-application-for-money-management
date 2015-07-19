<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {


	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function operationsbancaire(){
        return $this->hasMany('App\Models\OperationBancaire');
    }

    public function operations()
    {
        return $this->hasMany('App\Models\Operation');
    }

    public function etiquettes()
    {
        return $this->hasMany('App\Models\Etiquette');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Categorie');
    }

    public function compteepargne()
    {
        return $this->hasOne('App\Models\CompteEpargne');
    }
    public function operationpers(){
        return $this->hasMany('App\Models\Operationper');
    }


}
