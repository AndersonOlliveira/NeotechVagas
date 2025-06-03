<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VagasRequest;
use App\Models\tb_empresa_vaga;
use App\Models\tb_vaga;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function StoreVagas(VagasRequest $request) :JsonResponse
    {
 
         $restultado =  tb_vaga::PushVagas($request);

         if($restultado){
          
               return response()->json(['Status' =>2, 'menssage' => 'Sucesso ao Cadastrar Vaga'],200);
       
             }else{
          
            return response()->json(['Status' =>0, 'mensage' => 'Falhar ao Inserir'],200);
          }

         return response()->json(['Status' =>0, 'mensage' => 'Contate o Administrador'],500);
    }

    public function ListVagasid(Request $dados)
    {
          $retorno = tb_empresa_vaga::getidVaga($dados->id);

           if($retorno){
               return response()->json(['Status' =>2, 'data' => $retorno, 'menssage' => 'Sucesso ao Consultar'],200);
       
             }else{
          
            return response()->json(['Status' =>0, 'mensage' => 'Contate o Administrador'],200);

         }
    }
}
