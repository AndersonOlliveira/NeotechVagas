<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_empresa_vaga extends Model
{
    use  SoftDeletes;
    protected $table = 'tb_empresa_vaga';
    
    public static function getidVaga($id)
      {

       $retornoVagas =  DB::table('tb_empresa_vaga as vagasEmp')
         ->leftjoin('tb_vagas as tbvagas', 'tbvagas.id' ,'=', 'vagasEmp.vaga_id')
         ->leftJoin('tb_recruiter as rc', 'rc.idUserRecruiter', '=', 'vagasEmp.id_empresa')
         ->select(
         'tbvagas.titulo',
         'tbvagas.descricao',
         'tbvagas.tipo_contrato',
         'tbvagas.local',
         'tbvagas.requisitos',
         'tbvagas.modelo_vaga',
         'tbvagas.fechamento_vaga',
         'tbvagas.salario',
         'tbvagas.beneficios',
         'tbvagas.created_at',
         'rc.nome_empresa',
         )->where('vagasEmp.id_empresa',  '=', $id )->get();



        return $retornoVagas;

      }
}
