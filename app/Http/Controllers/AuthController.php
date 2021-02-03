<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class AuthController extends Controller
{
    public function login(Request $req)
    {
        if(Auth::attempt(['username' => $req->username, 'password' => $req->password,'verify'=>1])){
            $json['token']=Auth::user()->createToken('cloud')->accessToken;
            $json['data']=Auth::user();
            $json['kode']=200;
        }
        else{
            $json['kode']=203;
            $json['pesan']="username atau password anda salah";
        }

        return response()->json($json);
    }

    public function getdata()
    {
        $json['kode']=200;
        $json['data']=Auth::user();

        return response()->json($json);
    }

}
