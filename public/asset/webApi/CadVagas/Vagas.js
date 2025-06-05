
import { pushToken,token,pushModelo,Estados} from "../functions.js";

const nivelUsers = document.getElementById('nivel-user');
const nivelUser = nivelUsers.dataset.nivel;
const id = $('#id-user').val();

console.log(nivelUser);
if(nivelUser == 1 ){
    


document.getElementById('form-vaga').addEventListener('submit', async function (e) {
    e.preventDefault();
    
     submitVagas();

});

$(document).ready(function(){

    Vagasid();
});

async function submitVagas()
{ 
     let titulo,descricao,tipoContrato,local,salario,requisitos,beneficios,user,modelo;

     titulo = $('#titulo').val();
     descricao =$('#descricao').val();
     tipoContrato = $('#tipoContrato').val();
     local = $('#local').val();
     salario= $('#salario').val();
     requisitos = $('#requisitos').val();
     beneficios = $('#beneficios').val();
     user = $('#id-user').val();
     const pushModelos = document.querySelectorAll('input[name="tipoLocal[]"]:checked') 
     modelo = pushModelo(pushModelos);
     
    const dados = {
     titulo :titulo,
     descricao: descricao,
     tipoContrato:tipoContrato,
     local:local,
     salario:salario,
     requisitos:requisitos,
     beneficios:beneficios,
     id:user,
     modeloTra: modelo
   
    }

    const convertDados = JSON.stringify(dados);
    const valueToken = await token();

    
 $.ajax({
        url: '/api/Vacancies', // A URL onde os dados serão enviados
        type: 'post',
        dataType: 'json',
        data: convertDados, // Dados do formulário
        headers: {
           'Authorization': 'Bearer ' + valueToken,
            'X-CSRF-TOKEN': pushToken(),
             'Content-Type': 'application/json',
             'Accept': 'application/json', // Enviar o token CSRF
        },
        success: function (response) {

           
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

// buscar vagas por id 

async function Vagasid()
{  
    let user;

    user = $('#id-user').val();



const dados = {
   
     id:user
   
    }

    const convertDados = JSON.stringify(dados);
    const valueToken = await token();

 $.ajax({
        url: '/api/Allvagasid', // A URL onde os dados serão enviados
        type: 'post',
        dataType: 'json',
        data: convertDados, // Dados do formulário
        headers: {
           'Authorization': 'Bearer ' + valueToken,
            'X-CSRF-TOKEN': pushToken(),
             'Content-Type': 'application/json',
             'Accept': 'application/json', // Enviar o token CSRF
        },
        success: function (response) {

            if (response.Status == 2) {

               montarVagas(response.data);
 
            } else {

               montarErro();
             
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

function montarVagas(dados)
{  
   
     if(!dados[0]){

        const divSVagas = document.getElementById('semVagas');
         divSVagas.innerHTML = '';
        const divsemvagas = document.createElement('div');
        divsemvagas.className = 'card mb-3 bg-light';
        divsemvagas.innerHTML = "SEM VAGAS CADASTRADAS";
        divSVagas.appendChild(divsemvagas);
       
     }

    const divVagas = document.getElementById('listarVagas');
    divVagas.innerHTML = '';

    dados.forEach(vaga => {
        const card = document.createElement('div');
        card.className = 'card mb-3 bg-light';
        card.innerHTML = `
       
        <div class="card-body">
                <div id="status" class="element" data-status="${vaga.status ?? ''}">
                    <p class="card-title"><strong>Vaga:</strong>${vaga.titulo}</p>
                    <div class="col d-flex align-items">
                        <strong>Empresa:</strong>   ${vaga.nome_empresa}
                        </div>
                   <strong>Sobre a Vaga:</strong>
                        <div class="col d-flex align-items">
                           ${vaga.descricao}
                        </div>
                    <div class="card-title" id="dadosVaga">
                        <strong>Tipo de contrato:</strong> ${vaga.tipo_contrato}<br>
                        <strong>Local:</strong> ${vaga.local}<br>
                        <strong>Salário:</strong> R$ ${parseFloat(vaga.salario).toFixed(2)}<br>
                        <strong>Requisitos:</strong> ${vaga.requisitos}<br>
                        <strong>Benefícios:</strong> ${vaga.beneficios}
                    </div>
                    <h6 class="card-title">Data abertura: ${vaga.created_at ? new Date(vaga.created_at).toLocaleDateString() : ''}</h6>
                    <h6 class="card-title">Ref Cidade: ${vaga.cidade ?? 'Não informado'}</h6>
                `;

        divVagas.appendChild(card);
    });

}
}//nivel 1


   

