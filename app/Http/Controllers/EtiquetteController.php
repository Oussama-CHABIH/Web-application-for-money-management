<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Etiquette;
use Illuminate\Http\Request;

/**
 * Class EtiquetteController
 *@Middleware("admin")
 *
 * @package App\Http\Controllers
 */

class EtiquetteController extends Controller {

	/**
     * @get("etiquettes")
     * @return Response
     */

    public function index(){
        return view('default.add-etiquette');
    }

    /**
     * @post("add-etiquettes")
     * @return Redirect
     */
    public function addetiquette(Request $request){
        $et = new Etiquette;
        $et->nom = $request->nom;
        $et->prenom = $request->prenom;
        $et->cin = $request->cin;
        \Auth::user()->etiquettes()->save($et);
        return redirect('/etiquettes');
    }

    /**
     * @Get("/deletetquette/{id}")
     * @return Rediredt
     */
    public function deletetiquette($id){
        Etiquette::find($id)->delete();
        return redirect('/etiquettes');
    }

    /**
     * @Get("/editetiquette/{id}")
     * @return App\Models\Etiquette
     */
    public function editetiquette($id){
        return view('default.edit-etiquette')->with('data', Etiquette::find($id));
    }

    /**
     * @Post("editetiquette")
     * @return Redirect
     */
    public function posteditetiquette(Request $request){
        $one = Etiquette::find($request->get('id'));
        $one->nom = $request->nom;
        $one->prenom = $request->prenom;
        $one->cin = $request->cin;
        $one->save();
        return redirect('/etiquettes');
    }



}
