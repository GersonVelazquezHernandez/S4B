<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    function userLogin(Request $req){
        $data = $req->input();
        $user = new User();
        $resp = $user->obtenerUsuario($data['user']);
        if($resp != 'Error'){
            if($resp['password'] == $data['password']){
                $req->session()->put('user',$resp['nombre']);
                return redirect('/'); 
            }
        }
        return redirect('logout/');
    }
}
