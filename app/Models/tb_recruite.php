<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tb_recruite extends Model
{
     protected $table = 'tb_recruiter';
  
      
    public static function getRecruiterInsert($phoneMask,$request,$idUserInsert)
    {
       
        extract($request->all());

           DB::beginTransaction();
         
        
           try{
          
            $insert = [
             'idUserRecruiter' => $idUserInsert,
             'phone' => $phoneMask,
             'nome_empresa' => $nempresa,
             'created_at' => now()
            ];

             $result = DB::table('tb_recruiter')->insert($insert);
            
               DB::commit();
              
               return $result;

    } catch (\Exception $e){

         dd($e);
        return $e;
    }

}
}
