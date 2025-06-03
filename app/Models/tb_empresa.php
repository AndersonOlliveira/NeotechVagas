<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tb_empresa extends Model
{
   
    protected $table = 'tb_empresa_vaga';
    

    public static function inserAll($idvaga,$idRe)
    {

        
         DB::beginTransaction();


         try{
            $insert = [
               'id_empresa' => $idRe,
               'vaga_id'=> $idvaga,
               'created_at' => now()

            ];

              DB::table('tb_empresa_vaga')->insertGetId($insert);
 
             DB::commit();

             return true;
            
         } catch (\Exception $e){

           
            return $e;
         }


    }
}
