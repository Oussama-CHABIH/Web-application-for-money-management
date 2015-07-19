<?php namespace App\Http\Controllers;

/**
 * Class CompteBancaireController
 *@Middleware("admin")
 *
 * @package App\Http\Controllers
 */

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CompteEpargne;
use Illuminate\Support\Facades\Auth;
use App\Models\CompteBancaire;
use App\Models\User;
use Illuminate\Http\Request;

class CompteBancaireController extends Controller {


    /**
     * @POST("/complete-profile")
     * @return Redirect
     */
    public function completeprofile(Request $request){

        $user = User::find(Auth::user()->id);
        $user->soldebancaire = $request->sb;
        $user->solde_poche = $request->soldepoche;
        $user->frais = $request->frais;
        $user->solde_totale = $request->sb + $request->soldepoche;


        $ce = new CompteEpargne;

        $ce->mode_epargne = $request->me;
        $ce->taux_epargne = $request->taux;

        if($ce->mode_epargne=="pourcentage"){
        $ce->solde_epargne = $user->solde_totale *  $ce->taux_epargne /100 ;
        }
        else if($ce->mode_epargne=="somme-fix") {$ce->solde_epargne = $ce->taux_epargne; }
        else{ $ce->solde_epargne = 0 ;
              $ce->taux_epargne = 0;}
        $user->solde_totale = $request->sb + $request->soldepoche - $ce->solde_epargne;
            

                $user->save();

        $user->compteepargne()->save($ce);

        return redirect('/');

    }

    /**
     * @get("/test")
     * @return Response
     */
    /*public function test(){
        $user = User::find(Auth::user()->id);
        $x =  $user->compteepargne->solde_epargne;
        return $x;
    }*/

}
