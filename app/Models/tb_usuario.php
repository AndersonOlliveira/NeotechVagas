<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_usuario extends Model
{
    use SoftDeletes;
    
    protected $table = 'tb_usuarios';
  
      
    public static function gettbUserInsert($phoneMask,$request,$filename,$idUserInsert)
    {
           extract($request->all());

           DB::beginTransaction();
         
          try{
          
            $insert = [

            'idUser' => $idUserInsert,
            'name' => $nome,
            'phone' => $phoneMask,
            'genero' => $genero,
            'idFomacao' => $nivelFormacao,
            'nameCurso' => $formacoes ,
            'cv' => $filename, 
            'estado' => $estado,
            'cidade' => $city,
            'created_at' => now()
            ];

            $result =  DB::table('tb_usuarios')->insert($insert);
            
               DB::commit();
              
               return $result;

    } catch (\Exception $e){

        return $e;
    }

}
}

