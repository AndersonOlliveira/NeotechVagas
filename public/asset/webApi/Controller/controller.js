//pegar o nivel e liberar um input para cadastra a vaga
const nivelUsers = document.getElementById('nivel-user');
const nivelUser = nivelUsers.dataset.nivel;

console.log(nivelUser);

if (nivelUser != 0 && nivelUser != 2) {
    const divModal = document.getElementById('div-vagas');
    const selectElement = document.createElement('button');
    selectElement.className = 'btn btn-primary';
    selectElement.id = 'forms-pgSelect';
    selectElement.innerHTML = 'Cadastrar Vaga';

    // Definindo atributos do Bootstrap para modal
    selectElement.setAttribute('data-bs-toggle', 'modal');
    selectElement.setAttribute('data-bs-target', '#modalVagas');
    divModal.appendChild(selectElement);
}

if(nivelUser == 2){
 
    let newlink;const  divlista = document.getElementById('listar-Users');
   newlink = document.createElement('a');
   newlink.innerHTML = 'Listar Usúarios';
   newlink.className = "btn btn-primary";
   newlink.link = 'Listar';
   newlink.setAttribute('href', 'Listar');
   divlista.appendChild(newlink);

    console.log('nivel adm');

}


