<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ConnexionController extends Controller {

    /**
     * @Get("/connexion")
     * @return Response
     */
    public function connexion(){
        return view('connexion');
    }

    /**
     * @Get("/inscrir")
     * @return Response
     */
    public function inscrir(){
        return view('inscrir');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function test(Request $request)
	{
        return $request->all();
	}

    /**
     * la méthode d'inscription
     * @Post("/inscription")
     *
     * @return Redirect
     */
    public function inscription(AddUserRequest $request){
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = \Hash::make($request->pwd);
        $user->save();
        Auth::login($user);
        return redirect('/profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @Post("/connecter")
     * @return Redirect
     */
    public function postConnexion(Request $request)
    {
        /*return json_encode(Auth::attempt(['email' => $request->email, 'password' => $request->pwd]));*/
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pwd])) {
            return redirect()->intended('/');
        } else {
            return Redirect::Back();
        }

        /*return json_encode(Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]));*/

    }

    /**
     * @Get("/deconnexion", as="DECONNEXION")
     * @return Redirect
     */
    public function deconnexion(){
        Auth::logout();
        return redirect('/connexion');
    }
}
