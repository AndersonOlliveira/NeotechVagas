<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\tb_empresa;

class tb_vaga extends Model
{
    use SoftDeletes;
    protected $table = 'tb_vagas';


    //inserir vagas 
    public static function PushVagas($dados)
    {

        extract($dados->all());

        if (is_array($modeloTra)) {
            $modeloTraString = implode(', ', $modeloTra); // Junta todos os valores com vírgula e espaço
        } else {
            $modeloTraString = $modeloTra; 
        }
 
          DB::beginTransaction();


        try {
            $insert = [
                'titulo' => $titulo,
                'descricao' => $descricao,
                'tipo_contrato' => $tipoContrato,
                'local' => $local,
                'salario' => $salario,
                'requisitos' => $requisitos,
                'beneficios' => $beneficios,
                'created_at' => now(),
                'modelo_vaga' => $modeloTraString,

            ];
            
            $idVaga = DB::table('tb_vagas')->insertGetId($insert);
            //faco o insert na empresa
            tb_empresa::inserAll($idVaga, $id);


            DB::commit();

            return $id;
        } catch (\Exception $e) {
dd($e);
            return 'Falha em inserir' . $e;
        }
    }
}
