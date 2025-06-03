@extends('layout.corpo')
@section('title', 'Listar')
@section('content')
<!--crio um botao para cadastar as vagas  -->

<div class="container-fluid" id="cards">
<div class="vagas" id="div-vagas">
  <div class="modal fade" id="modalVagas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalVagas" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalVagas">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="container mt-4">
  <form id="form-vaga" method="POST">
    @csrf

    <h4 class="mb-4">Cadastro de Vaga</h4>

    <div class="mb-3">
      <label for="titulo" class="form-label">Título da Vaga</label>
      <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>

    <div class="mb-3">
      <label for="descricao" class="form-label">Descrição da Vaga</label>
      <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label for="tipoContrato" class="form-label">Tipo de Contrato</label>
      <select class="form-select" id="tipoContrato" name="tipoContrato" required>
        <option value="" disabled selected>Selecione</option>
        <option value="clt">CLT</option>
        <option value="pj">PJ</option>
        <option value="freelancer">Freelancer</option>
        <option value="estagio">Estágio</option>
        <option value="temporario">Temporário</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="local" class="form-label">Local da Vaga</label>
      <input type="text" class="form-control" id="local" name="local" required>
    </div>

    <div class="mb-3">
      <label for="salario" class="form-label">Salário (R$)</label>
      <input type="number" class="form-control" id="salario" name="salario" min="0" step="0.01">
    </div>

    <div class="mb-3">
      <label for="requisitos" class="form-label">Requisitos</label>
      <textarea class="form-control" id="requisitos" name="requisitos" rows="3"></textarea>
    </div>

    <div class="mb-3">
      <label for="beneficios" class="form-label">Benefícios</label>
      <textarea class="form-control" id="beneficios" name="beneficios" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Cadastrar Vaga</button>
  </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<p>ESTOU NA TELA DE HOME VOU LISTAR AS VAGAS</p>


<script type="module" src="{{ asset('asset/webApi/Controller/controller.js')}}"></script>
<script type="module" src="{{ asset('asset/webApi/CadVagas/Vagas.js')}}"></script>
@endsection