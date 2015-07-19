<?php namespace App\Http\Controllers;

/**
 * Class AdminController
 *@Middleware("admin")
 *
 * @package App\Http\Controllers
 */

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Operationper;
use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
     * @Get("/")
     * @return Response
     */
    public function accueil(){
        


        return view('default.add-etiquette');
     }


    /**
     * @Get("/profile")
     * @return Response
     */
    public function profile(){
        return view('default.profile');
    }

     /**
     * @Get("informations")
     *
     */
    public function pdf(){
        $user= User::with(['operationpers','compteepargne','operations'])->find(\Auth::user()->id);
        $pdf = \PDF::loadView('pdf', $user->toArray());
        return $pdf->download('information-personnel.pdf');
    }
}
