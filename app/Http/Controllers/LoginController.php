<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AutenticacaoController;

class LoginController extends Controller
{
    public function index(LoginRequest $request )
    {

        //   dd($request);
    $controllerValidaAuth = new  AutenticacaoController();

    $auth = $controllerValidaAuth->autenticar($request);
  
     return response()->json([
                'Status' => 2,
                  'data' => $auth,
                'Message' => 'Meta já Cadastrada para este mês'
            ]);

    // return  $this->redirecionarPage($auth);
        

    }
 
     public function redirecionarPage($dadosAuth)
  {

    if ($dadosAuth) {

      return view('pages.home');
    } else {

      return back()->withInput()->with('msg', 'Usúario ou senha inválidos');
    }
  }
}
