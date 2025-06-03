<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"  href="asset/css/bootstrap.min.css"> <!-- Include the CSS -->
    <link rel="stylesheet"  href="asset/css/style.css"> <!-- Include the CSS -->
     <title>Vagas</title>
   </head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Vagas:</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <form class="d-flex" role="search">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">

       <input type="hidden" class="form-control" id="testeDiv" value="3"/>
        <li class="nav-item">
          <button button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-login" data-bs-whatever="@mdo">Login</button>
        </li>
        <li class="nav-item">
         <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cadatratar" data-bs-whatever="@cadastra-se">Cadastra-se</button>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>
  <body>
    
<!-- modal Login -->
   <div class="modal fade" id="Modal-login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal-login" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal-login">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form id="form-login" method="get" action="{{route('login')}}"> -->
        <form id="form-login">
          <!-- @csrf -->
           <div class="" id="erro"></div>
          <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Email address</label>
           <input type="email" class="form-control" id="id-adress" name="email" placeholder="name@example.com">
           </div>
                
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Senha:</label>
             <input type="password" name="password-login" id="password-login" class="form-control" autocomplete="password-login" />
             </div>
             <button type="submit" name="enviar" class="form-control botao-fluxo" value="Enviar">Enviar</button>
          </form>
        </div>
       </div>
  </div>
</div>
<!-- modal CADASTRAR> -->

<div class="modal fade" id="cadatratar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cadatratar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cadatratar">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
 @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

    <!-- aqui vem o conteudo da pagina -->
   @yield('content')
  
    <!-- Include jQuery (required) and the JS -->
   </body>
    <script type="text/javaScript"  src="asset/js/cdn/jquery-3.7.1.min.js"></script>
   <script type="text/javaScript"  src="asset/js/cdn/bootstrap.bundle.min.js"></script>
  
   <script type="text/javaScript" src="asset/js/cdn/bootstrap.min.js"></script>
   <script type="text/javaScript"  src="asset/js/cdn/popper.min.js"></script>
</html>