@extends('layout.index')
@section('title', 'Listar')
@section('content')


<div class="container-fluid" id="cards">
    <div class="card mb-3 bg-light">
        <div class="card-body">
            <div id="status" class="element" data-status="" value="">
                <p name="desc-vaga" value="" class="card-title">Descrição Vaga</p>
                <h5 class="card-title"></h5>
                <div class="informacao-direita">
                    <div class="col d-flex align-items">
                  aqui vem a descricao da vaga 
                </div>
               </div>
                 <div class="card-title" id="dadosVaga"></div>
               <h6 class="card-title">Data abertura: </h6>
                <h6 class="card-title">Ref Cidade: </h6>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <input id="candidatar" name="Candidatar" class="btn btn-success Candidatar" type="submit" value="Candidatar"/>
              </div>
        </div>
    </div>
</div>


<script type="module" src="{{ asset('asset/webApi/listaVagas.js')}}"></script>

@endsection