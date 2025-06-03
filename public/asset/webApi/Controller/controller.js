//pegar o nivel e liberar um input para cadastra a vaga
import { token } from "../functions.js";
const nivelUsers = document.getElementById('nivel-user');
const nivelUser = nivelUsers.dataset.nivel;
console.log(nivelUser);

if (nivelUser != 0) {
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
