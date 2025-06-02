<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacaoController extends Controller
{
    
     public function autenticar($dados){

         
           $credentials = ['email' => $dados->email, 'password' => $dados->password];

           if(Auth::attempt($credentials)){
            
              $user = Auth::user();
              //crio o token
              $token = $user->createToken('token-api')->plainTextToken;
           
              
             return $token;
        
        }

         $resultAuth = false;
       
         return $resultAuth;
       }
}
