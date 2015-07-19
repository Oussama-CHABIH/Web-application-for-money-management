<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Etiquette;
use App\Models\Categorie;
use App\Models\CompteEpargne;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Operation;
use Illuminate\Http\Request;

/**
 * Class OperationController
 *@Middleware("admin")
 *
 * @package App\Http\Controllers
 */

class OperationController extends Controller {

  /**
     * @get("operations")
     * @return Response
     */

    public function index(){
        return view('default.add-operation');
    }

    /**
     * @post("add-operations")
     * @return Redirect
     */
    public function addoperation(Request $request){
        $et = new Operation;
        $et->nom = $request->nom;
        $et->epargne = $request->epargne;
        $et->type_dr = $request->type_dr;
        $et->montant = $request->montant;
        $et->mode_paiement = $request->mode_paiement;
        $et->description = $request->description;
        $et->etiquette_id = $request->etiquette;
        $et->categorie_id = $request->categorie;
        /********************************************************/
        $user = User::find(Auth::user()->id);
        $ce = $user->compteepargne;
        if($et->epargne=="non" ){

        if($et->type_dr=="depense" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche-$request->montant; 
          $user->solde_totale=$user->solde_totale-$request->montant; 
          $user->save();}

        if($et->type_dr=="revenue" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire+$request->montant;
          $user->solde_totale=$user->solde_totale+$request->montant;  
          $user->save();}

        if($et->type_dr=="depense" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire-$request->montant; 
          $user->solde_totale=$user->solde_totale-$request->montant; 
          $user->save();}    
        
        if($et->type_dr=="revenue" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche+$request->montant;
          $user->solde_totale=$user->solde_totale+$request->montant;  
          $user->save();}}
        if ($request->epargne=="oui" AND $et->mode_paiement=="poche" AND $et->type_dr=="revenue" /*AND $ce->mode_epargne != 0*/) {
          $ce->solde_epargne = $ce->solde_epargne+$request->montant; 
          $user->solde_poche=$user->solde_poche+$request->montant; 
           $ce->save();
          $user->save();}
        if ($request->epargne=="oui" AND $et->mode_paiement=="bank" AND $et->type_dr=="depense"/*AND $ce->mode_epargne != 0*/) {
          $ce->solde_epargne = $ce->solde_epargne-$request->montant; 
          $user->soldebancaire=$user->soldebancaire-$request->montant;
           $ce->save();
          $user->save();}
        if ($request->epargne=="oui" AND $et->mode_paiement=="poche" AND $et->type_dr=="depense" /*AND $ce->mode_epargne != 0*/) {
          $ce->solde_epargne = $ce->solde_epargne-$request->montant; 
          $user->solde_poche=$user->solde_poche-$request->montant; 
           $ce->save();
          $user->save();}
        if ($request->epargne=="oui" AND $et->mode_paiement=="bank" AND $et->type_dr=="revenue"/*AND $ce->mode_epargne != 0*/) {
          $ce->solde_epargne = $ce->solde_epargne+$request->montant; 
          $user->soldebancaire=$user->soldebancaire+$request->montant;
           $ce->save();
          $user->save();}
             
        
        



        /********************************************************/
        \Auth::user()->operations()->save($et);
        // return Operation::with('etiquette','categorie')->get();
        return redirect('/operations')->with([
        'etiquette' => Etiquette::all(),
        'categorie' => Categorie::all(),
        'operations' => Operation::where('user_id',\Auth::user()->id)->with('etiquette','categorie')->get()
        ]);
    }

    //\Auth::user()->operations


    /**
     * @get("operations")
     * @return Redirect
     */

    public function operations(){
        /*return Operation::where('user_id',\Auth::user()->id)
                        ->with('etiquette','categorie')
                        ->get();*/
        return view('default.add-operation')->with([
            'etiquette' => \Auth::user()->etiquettes ,
            'categorie' => \Auth::user()->categories ,
            'operations' => Operation::where('user_id',\Auth::user()->id)->with('etiquette','categorie')->get()
        ]);
    }


    /**
     * @Get("/deleteoperation/{id}")
     * @return Rediredt
     */
    public function deleteoperation($id){
        Operation::find($id)->delete();
        return redirect('/operations');
    }

    /**
     * @Get("/editoperation/{id}")
     *
     */
    public function editoperation($id){

        return view('default.edit-operation')->with('data', Operation::find($id));
    }

    /**
     * @Post("/editoperation")
     *
     */
    public function posteditoperation(Request $request){
        $et = Operation::find($request->get('id'));
        // $et->nom = "000";
        //  $et->montant += 100 ;
        $user = User::find(Auth::user()->id);
        if($et->type_dr=="depense" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche+$request->montant; 
          $user->solde_totale=$user->solde_totale+$request->montant; 
          $user->save();}

        if($et->type_dr=="revenue" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire-$request->montant;
          $user->solde_totale=$user->solde_totale-$request->montant;  
          $user->save();}

        if($et->type_dr=="depense" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire+$request->montant; 
          $user->solde_totale=$user->solde_totale+$request->montant; 
          $user->save();}    
        
        if($et->type_dr=="revenue" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche-$request->montant;
          $user->solde_totale=$user->solde_totale-$request->montant;  
          $user->save();}

         $et->nom = $request->nom;
         $et->type_dr = $request->type_dr;
         $et->montant = $request->montant;
         $et->mode_paiement = $request->mode_paiement;
         $et->description = $request->description;
         $et->etiquette_id = $request->etiquette;
         $et->categorie_id = $request->categorie;
        if($et->type_dr=="depense" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche-$request->montant; 
          $user->solde_totale=$user->solde_totale-$request->montant; 
          $user->save();}

        if($et->type_dr=="revenue" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire+$request->montant;
          $user->solde_totale=$user->solde_totale+$request->montant;  
          $user->save();}

        if($et->type_dr=="depense" AND $et->mode_paiement=="bank"){

          $user->soldebancaire=$user->soldebancaire-$request->montant; 
          $user->solde_totale=$user->solde_totale-$request->montant; 
          $user->save();}    
        
        if($et->type_dr=="revenue" AND $et->mode_paiement=="poche"){

          $user->solde_poche=$user->solde_poche+$request->montant;
          $user->solde_totale=$user->solde_totale+$request->montant;  
          $user->save();}
         $et->save();
        return redirect('/operations')->with([
            'etiquette' => Etiquette::all(),
            'categorie' => Categorie::all(),
            'operations' => Operation::where('user_id',\Auth::user()->id)->with('etiquette','categorie')->get()
        ]);
    }
    // public function per(Request $request){
    //   $et = Operation::find($request->get('id'));
    //   $tab=explode(" ", $et->created_at);
    //   $ta=explode("-",$tab[0]);
    //   $a = $ta[1]*30*24*3600 + $ta[2]*24*3600 ;

    // }
}

