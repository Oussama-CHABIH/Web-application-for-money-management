<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Operation;
use App\Models\User;
use App\Models\Etiquette;
use App\Models\Categorie;
use App\Models\Operationper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class OperationperController
 *@Middleware("admin")
 *
 * @package App\Http\Controllers
 */

class OperationperController extends Controller {

    /**
     * @get("operationpers")
     * @return Response
     */

    public function index(){
        return view('default.add-operationper');
    }

    /**
     * @post("add-operationpers")
     * @return Redirect
     */
    public function addoperationper(Request $request){
        $et = new Operationper;
        $t  = new Etiquette;
        $t->nom = $request->nom;
        $t->prenom = $request->prenom;
        $t->cin = $request->cin;
        $et->cin = $request->cin;
        $et->N_BORDEREAU_ARRVEE = $request->N_BORDEREAU_ARRVEE;
        $et->DATE_ARRIVEE = $request->DATE_ARRIVEE;
        $et->N_BORDEREAU_ENVOI = $request->N_BORDEREAU_ENVOI;
        $et->DATE_ENVOI = $request->DATE_ENVOI;              
        $et->DATE_RECEPTION = $request->DATE_RECEPTION;
        $et->DATE_REMISE = $request->DATE_REMISE;
        $et->N_SERIE = $request->N_SERIE;
        $et->N_COMMANDE = $request->N_COMMANDE;
        $t->save();
        
        $et->categorie_id = $request->categorie;
        \Auth::user()->operationpers()->save($et);
        return redirect('/operationpers')->with([
            'etiquette' => Etiquette::all(),
            'categorie' => Categorie::all(),  
            'operationpers' => Operationper::where('user_id',\Auth::user()->id)->with('etiquette','categorie')->get()
        ]);
    }
    /**
     * @get("operationpers")
     * @return Redirect
     */

    public function operationpers(){
        /*return Operation::where('user_id',\Auth::user()->id)
                        ->with('etiquette','categorie')
                        ->get();*/
        return view('default.add-operationper')->with([
            'etiquette' => Etiquette::all(),
            'categorie' => Categorie::all(),  
            'operationpers' => Operationper::where('user_id',\Auth::user()->id)->with('etiquette','categorie')->get()
        ]);
    }


    /**
     * @Get("/deleteoperationper/{id}")
     * @return Rediredt
     */
    public function deleteoperationper($id){
        Operationper::find($id)->delete();
        return redirect('/operationpers');
    }
    /**
     * @Get("/editoperationper/{id}")
     *
     */
    public function editoperationper($id){

        return view('default.edit-operationper')->with('data', Operationper::find($id));
    }

    /**
     * @Post("/editoperationper")
     *
     */
    public function posteditoperationper(Request $request){
        $et = Operationper::find($request->get('id'));
        $user = User::find(Auth::user()->id);
        // ****************************************************
        if($et->type_dr=="depense" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche+$request->montant*$et->cpt; 
          $user->solde_totale=$user->solde_totale+$request->montant*$et->cpt; 
          $user->save();}

        if($et->type_dr=="revenue" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire-$request->montant*$et->cpt;
          $user->solde_totale=$user->solde_totale-$request->montant*$et->cpt;  
          $user->save();}

        if($et->type_dr=="depense" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire+$request->montant*$et->cpt; 
          $user->solde_totale=$user->solde_totale+$request->montant*$et->cpt; 
          $user->save();}    
        
        if($et->type_dr=="revenue" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche-$request->montant*$et->cpt;
          $user->solde_totale=$user->solde_totale-$request->montant*$et->cpt;  
          $user->save();}
        // *******************************************************
        $et->frequence = $request->frequence;
        $et->nom = $request->nom;
        $et->type_dr = $request->type_dr;
        $et->montant = $request->montant;
        $et->mode_paiement = $request->mode_paiement;
        $et->description = $request->description;
        $et->etiquette_id = $request->etiquette;
        $et->categorie_id = $request->categorie;
        $et->date_d = $request->date_d;
        $et->date_f = $request->date_f;
        // *******************************************************
        if($et->type_dr=="depense" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche-$request->montant*$et->cpt; 
          $user->solde_totale=$user->solde_totale-$request->montant*$et->cpt; 
          $user->save();}

        if($et->type_dr=="revenue" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire+$request->montant*$et->cpt;
          $user->solde_totale=$user->solde_totale+$request->montant*$et->cpt;  
          $user->save();}

        if($et->type_dr=="depense" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire-$request->montant*$et->cpt; 
          $user->solde_totale=$user->solde_totale-$request->montant*$et->cpt; 
          $user->save();}    
        
        if($et->type_dr=="revenue" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche+$request->montant*$et->cpt;
          $user->solde_totale=$user->solde_totale+$request->montant*$et->cpt;  
          $user->save();}
        // *******************************************************
        $et->save();
        return redirect('/operationpers')->with([
            'etiquette' => Etiquette::all(),
            'categorie' => Categorie::all(),  
            'operationpers' => Operationper::where('user_id',\Auth::user()->id)->with('etiquette','categorie')->get()
        ]);
    }

}
