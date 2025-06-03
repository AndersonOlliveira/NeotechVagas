<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AutenticacaoController extends Controller
{

   public function autenticar($dados)
   {



      $credentials = ['email' => $dados->email, 'password' => $dados->passwordLogin];

      if (Auth::attempt($credentials)) {

         $user = Auth::user();
           
          $verificar = User::getToken($user->id);

         if (!$verificar) {

            $token = $user->createToken('token-api')->plainTextToken;
         }

         $resultAuth = true;

         return $resultAuth;
      }

      $resultAuth = false;

      return $resultAuth;
   }
}
