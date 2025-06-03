import { pushToken ,envitoken} from "../functions.js";
document.getElementById('form-vaga').addEventListener('submit', async function (e) {
    e.preventDefault();
    
     submitVagas();

});

async function submitVagas()
{ 
     let titulo,descricao,tipoContrato,local,salario,requisitos,beneficios

     titulo = $('#titulo').val();
     descricao =$('#descricao').val();
     tipoContrato = $('#tipoContrato').val();
     local = $('#local').val();
     salario= $('#salario').val();
     requisitos = $('#requisitos').val();
     beneficios = $('#beneficios').val();


   const dados = {
     titulo :titulo,
     descricao: descricao,
     tipoContrato:tipoContrato,
     local:local,
     salario:salario,
     requisitos:requisitos,
     beneficios:beneficios
   
    }

    const convertDados = JSON.stringify(dados);


    console.log(envitoken(), 'e para vim o token');
 $.ajax({
        url: '/api/CadVagas', // A URL onde os dados serão enviados
        type: 'post',
        dataType: 'json',
        data: convertDados, // Dados do formulário
        headers: {
           'Authorization': 'Bearer ' +  token(),
            'X-CSRF-TOKEN': pushToken(),
             'Content-Type': 'application/json',
             'Accept': 'application/json', // Enviar o token CSRF
        },
        success: function (response) {

              console.log(response);
            if (response.Status == 2) {


             
 
            } else {

             
            }

        },
        error: function (xhr, status, error) {
        const errors = xhr.responseJSON.errors;
                for (let campo in errors) {
                    errors[campo].forEach(msg => {

                        $('#erroRecruiter').append(`<p class="alert alert-danger"> ${campo}: ${msg}</p>`);
                    });
                }
                console.error('Erro ao enviar:', error);
            }

    });


     
}
