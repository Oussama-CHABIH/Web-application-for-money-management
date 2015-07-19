<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Categorie;
use Illuminate\Http\Request;

/**
 * Class CategorieController
 *@Middleware("admin")
 *
 * @package App\Http\Controllers
 */

class CategorieController extends Controller {

    /**
     * @get("categories")
     * @return Response
     */

    public function index(){
        return view('default.add-categorie');
    }

    /**
     * @post("add-categories")
     * @return Redirect
     */
    public function addcategorie(Request $request){
        $et = new Categorie;
        $et->nom = $request->nom;
        \Auth::user()->categories()->save($et);
       return redirect('/categories');
    }

    /**
     * @Get("/deletecategorie/{id}")
     * @return Rediredt
     */
    public function deletecategorie($id){
        Categorie::find($id)->delete();
        return redirect('/categories');
    }


/**
     * @Get("/categories/{id}")
     * @return App\Models\Categorie
     */
    public function editcategorie($id){
        return Categorie::find($id);
    }

    /**
     * @Post("EDIT-CATEGORIE")
     * @return Redirect
     */
    public function posteditcategorie(Request $request){
        $one = Categorie::find($request->get('id'));
        $one->nom = $request->nom;
        $one->save();
        return redirect('/categories');
    }
}
