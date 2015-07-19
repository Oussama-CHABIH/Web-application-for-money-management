<?php
/**
 * Created by PhpStorm.
 * User: Mehdii
 * Date: 20/06/2015
 * Time: 01:10
 */

namespace app\Services;


use App\Models\User;

class DateService {
     public function toseconds($date){
         return strtotime($date);
     }

    public function test(){
        $user = User::find(8);
        $user->frais+= 1;
        $user->save();
    }
}