<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Models\Operation;
use Illuminate\Support\Facades\App;

get('/test',function(){
    return $user= Auth::user()->with(['operationpers','compteepargne','operations'])->find(Auth::user()->id);
});




