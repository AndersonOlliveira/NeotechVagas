import { saveStorage, pushStorage,pushToken } from './functions.js'

console.log('estou aqui');

document.getElementById('form-login').addEventListener('submit', async function (e) {
    e.preventDefault();
      saveStorage($('#id-adress').val());

      loginTeste();

});
//aqui vou listar alguma vagas 

function loginTeste()
{

    console.log($('#id-adress').val());

    const dados = {
        email: $('#id-adress').val(),
        password: $('#password-login').val()
    }

    const convert = JSON.stringify(dados);

     $.ajax({
        url: '/Login', // A URL onde os dados serão enviados
        type: 'post',
        dataType: 'json',
        data: convert, // Dados do formulário
        headers: {
            'X-CSRF-TOKEN': pushToken(),
             'Content-Type': 'application/json',
        'Accept': 'application/json', // Enviar o token CSRF
        },
        success: function (response) {

              console.log(response);
            if (response.Status == 2) {


               window.location.href = '/Home'; // ou outro caminho
 
            } else {

                alert('Falha em localicalizar dados deste mês');

            }

        },
        error: function (xhr, status, error) {
        const errors = xhr.responseJSON.errors;
                for (let campo in errors) {
                    errors[campo].forEach(msg => {

                        $('#erro').append(`<p class="alert alert-danger"> ${campo}: ${msg}</p>`);
                    });
                }
                console.error('Erro ao enviar:', error);
            }

    });

}

