<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AutenticacaoController;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function processLogin(LoginRequest $request)
  {


    $controllerValidaAuth = new  AutenticacaoController();
  
      $auth = $controllerValidaAuth->autenticar($request);
  
     return  $this->redirecionarPage($auth);
  }

  public function redirecionarPage($dadosAuth)
  {

    if ($dadosAuth) {
           
       return view('pages.home');
    
        } else {

      return back()->withInput()->with('msg', 'Usúario ou senha inválidos');
    }
  }
  
  public function processDestroy()
   { 
     $user =  Auth::logout();
     
     return view('pages.listar');
  }

  


}
