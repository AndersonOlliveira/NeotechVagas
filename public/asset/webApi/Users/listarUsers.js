import { token, pushToken } from "../functions.js";


document.addEventListener('DOMContentLoaded', function () {
  
    buscarUsers();
  


//crio a tabela de usuarios

async function buscarUsers()
{
    const valueToken = await token();
      $.ajax({
              url: '/api/listUsers', // A URL onde os dados serão enviados
              type: 'post',
              dataType: 'json',
              headers: {
                 'Authorization': 'Bearer ' + valueToken,
                  'X-CSRF-TOKEN': pushToken(),
                   'Content-Type': 'application/json',
                   'Accept': 'application/json', // Enviar o token CSRF
              },
              success: function (response) {
      
                 
                  if (response.Status == 2) {
                
                     montarTabela(response.data);
       
                  } else {
      
                 
                    alert(response.menssage)
                  }
      
              },
              error: function (xhr, status, error) {
        
                      console.error('Erro ao enviar:', error);
                  }
      
          });

}
});

function montarTabela(dados)
{

    // console.log(dados);
$('#listar-users tbody').empty();
    $('#listar-users').DataTable({
        data: dados,

        order: [
            [0, 'desc']
        ],
        "columnDefs": [{
            "visible": true,
            "targets": -1
        }],
        
        scrollX: true,
        paging: true,
        searching: true,
        destroy: true,
        language: {
            emptyTable: "Sem dados a ser apresentado",
            entries: {
                _: 'Quantidade de entrada ',
                1: 'por página'
            },
            search: 'Pesquisar',
        },
        columns: [
            {
                data: 'idUser'
              
            },
            {

                data: 'name'
              
            },
            
            {
                data: 'nivelUser'
            },

            {
                data: 'email'

            },
           
            {

                data: 'phone'
                
            },
            {
                data: 'genero'
            },
            {
                data: 'idFomacao'

            },
            {
                data: 'nameCurso'

            },
            {
                data: 'cv'
               
            },
            {
              data:null,
              render(data,type,row) {

                   return renderEstadoCity(row);      
            }
            },
            {
                data: 'cidade'
               
            }

        ],
        

    });

}


function renderEstadoCity(row)
{
      let estado = row.estado;
      let city = row.cidade

      if(estado != '*' && city != '*' ){
          return `<td> ${estado} "/" ${city} </td>`;

      }else{
           return `<td> Sem informão</td>`;
      }
       
}


