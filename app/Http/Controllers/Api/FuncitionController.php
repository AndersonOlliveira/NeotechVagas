<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Email;

class FuncitionController extends Controller
{
    public function removeMask($tel)
    {
        $result = preg_replace('/\D/', '', $tel);

        return $result;
    }


    public function saveCv($file, $name, $id)
    {

        $folderPath = storage_path('app/public/Curriculos/' . $id);


        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        // Define o nome do arquivo

        $fileName = 'currículo_'  . $name . '.' . $file->getClientOriginalExtension();

        // Salvar o arquivo separado por pasta por email enviado

        if (Storage::putFileAs("public/Curriculos/$id/", $file, $fileName)) {

            return $fileName;
        } else {

            return false;
        }
    }

    public function maskPhone($number)
    {
        $str = (string) $number;
        $ddd = substr($str, 0, 2);
        $firstPart = substr($str, 2, 5);
        $secondPart = substr($str, 7, 4);
        return "($ddd) $firstPart-$secondPart";
    }

    public function functionGenero($valor)
    {

        $generos = [
            0 => 'Feminino',
            1 => 'Masculino',
            2 => 'Outro',
            3 => 'Prefiro não informar',
        ];


        $descricaoGenero = $generos[$valor] ?? 'Desconhecido';

        return $descricaoGenero;
    }
    
     public function functionFormacao($formacoes)
     {
        
        $idFormacoes = [
       
            1 => 'Ensino Médio',
            2 => 'Graduação',
            3 => 'Pós-graduação',
        ];


        $descricaoFormacao = $idFormacoes[$formacoes] ?? 'Desconhecido';

        return $descricaoFormacao;
     }
     public function functionNivel($idNivel)
     {
        
        $niveis = [
       
            0 => 'Canditado',
            1 => 'Recrutador',
            2 => 'Administrador',
        ];


        $infoNivel = $niveis[$idNivel] ?? 'Desconhecido';

        return $infoNivel;
     }

     public function functionAtivo($dados)
     {
 
          if(!isset($dados)){

            $infos = 'Ativo';
          }else{
             $infos = 'Inativo';
          }

         return $infos;
     }


     public  function finduser()
     {
          $user = Auth::user();

          return $user;
     }

     public function verificarEmail($email)
     {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             
             return true;  
        }else{

            return false;
        }
       }
}

