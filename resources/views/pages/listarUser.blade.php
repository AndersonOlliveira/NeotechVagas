@extends('layout.corpo')
@section('title', 'Listar')
@section('content')

<div class="container-fluid" id="cards">

<table id="listar-users" class="display">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Recrutador / Canditado </th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>gênero</th>
                <th>Formaçâo</th>
                <th>Curso Complementares</th>
                <th>Cidade Estado</th>
                <th>Curriculo</th>
                <th>Curriculo</th>
                <th>Curriculo</th>
                <th>Curriculo</th>
            </tr>
        </thead>
         <tbody>

    </tbody>
</table>


</div>

<script type="module" src="{{ asset('asset/webApi/Users/listarUsers.js')}}"></script>

@endsection
