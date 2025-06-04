<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListUsersController extends Controller
{
    public function storeUsers() : JsonResponse
    {

        $lista = [];

        $dados = new FuncitionController();



     $retorno = User::getUsersListall();
     $estadosIBGE = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados");
   
       if (!$estadosIBGE->successful()) {
         return response()->json(['erro' => 'Não foi possível buscar os estados'], 500);
    }

    $estados = $estadosIBGE->json();
  foreach ($retorno as $item) {
    foreach ($item as $campo => $valor) {

        if (!isset($valor) || is_null($valor)) {
            $item->$campo = '*'; 
        }
  
          if ($campo == 'estado' && is_numeric($valor)) {
        
                $estadoEncontrado = collect($estados)->firstWhere('id', (int)$valor);
                if ($estadoEncontrado) {
                    $item->estado = $estadoEncontrado['nome'];
                }
            }

           if ($campo == 'cidade' && is_numeric($valor)) {
            $municipioResponse = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/municipios/" . $valor);

            if ($municipioResponse->successful()) {
                $municipio = $municipioResponse->json();
                $item->cidade = $municipio['nome'] ?? '*';
            } else {
                $item->cidade = '*';
            }
        }
            
         if($campo == 'phone' && is_numeric($valor)){
            $retornoPhones = $dados->maskPhone($valor);
             $item->phone = $retornoPhones;
         }
        
         if($campo == 'genero' && is_numeric($valor)){
            $retornoGenero = $dados->functionGenero($valor);
             $item->genero = $retornoGenero;
         }
           if($campo == 'idFomacao' && is_numeric($valor)){
            $retornoFormacao = $dados->functionFormacao($valor);
             $item->idFomacao = $retornoFormacao;
         }
          if($campo == 'nivelUser' && is_numeric($valor)){
            $infoNivel = $dados->functionNivel($valor);
             $item->nivelUser = $infoNivel;
         }
         
    }
       //salvo no array todas as alteracoes
      $lista[] = $item;
   
   }
   
    
       if($lista){
                       
           return response()->json(['Status' => 2, 'data'=>$lista,  'menssage' => 'Sucesso em consultar Lista'], 200);
         
         } else {

            return response()->json(['Status' => 0, 'menssage' => 'Falha ao Solicitar Lista'], 500);
        }
   
        return response()->json(['Status' => 0, 'menssage' => 'Consulte o Administrador do Sistema'], 500);
    
    }
    

    
}
