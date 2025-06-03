<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FuncitionController extends Controller
{
     public function removeMask($tel)
     {
         $result = preg_replace('/\D/', '', $tel);
         
         return $result;
     }


     public function saveCv($file,$name,$id)
     {
                
         $folderPath = storage_path('app/public/Curriculos/' . $id);


            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            // Define o nome do arquivo

            $fileName = 'currículo_'  . $name . '.' . $file->getClientOriginalExtension();
 
            // Salvar o arquivo separado por pasta por email enviado
          
             if(Storage::putFileAs("public/Curriculos/$id/", $file, $fileName)){

                return $fileName;

             }else{

                return false;
             }
           
          

            

     }
}
