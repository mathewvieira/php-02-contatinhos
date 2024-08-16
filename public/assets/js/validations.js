let visitouInputNome = false;
let visitouInputEmail = false;
let visitouInputTelefone = false;

const divErros = document.querySelector('#div_erros');

const inputNome = document.querySelector('#input_nome');
const inputEmail = document.querySelector('#input_email');
const inputTelefone = document.querySelector('#input_telefone');

const btnEnviar = document.querySelector('#btn_enviar');

const msgErro = (msg) => `<div class="alert alert-danger">${msg}</div>`;
const inputVazio = (input) => input.value.trim() === '';

function exibirErro() {
  if (visitouInputNome && inputVazio(inputNome)) {
    divErros.innerHTML = msgErro('Nome inválido!');
    return;
  }

  if (visitouInputEmail && inputVazio(inputEmail)) {
    divErros.innerHTML = msgErro('Email inválido!');
    return;
  }

  if (visitouInputTelefone && inputVazio(inputTelefone)) {
    divErros.innerHTML = msgErro('Telefone inválido!');
    return;
  }

  divErros.innerHTML = '';
}

function validarInput(input) {
  exibirErro();

  if (input.value.trim() === '') {
    input.classList.add('is-invalid');
    input.classList.remove('is-valid');
    btnEnviar.setAttribute('disabled', 'disabled');
    return;
  }

  input.classList.remove('is-invalid');
  input.classList.add('is-valid');
  btnEnviar.removeAttribute('disabled');
}

inputNome.addEventListener('blur', () => {
  visitouInputNome = true;
  validarInput(inputNome);
});

inputEmail.addEventListener('blur', () => {
  visitouInputEmail = true;
  validarInput(inputEmail);
});

inputTelefone.addEventListener('blur', () => {
  visitouInputTelefone = true;
  validarInput(inputTelefone);
});
