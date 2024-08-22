const formWarning = document.querySelector('#form-warning');

const inputs = {
  nome: {
    element: document.querySelector('#input-nome'),
    visited: false
  },
  email: {
    element: document.querySelector('#input-email'),
    visited: false
  },
  telefone: {
    element: document.querySelector('#input-telefone'),
    visited: false
  },
  endereco: {
    element: document.querySelector('#input-endereco'),
    visited: false
  }
};

const btnEnviar = document.querySelector('#btn-enviar');

const warningMsg = (msg) => `<div class="alert alert-warning">${msg}</div>`;
const isEmpty = (input) => input.value.trim() === '';

function showWarning(msg) {
  formWarning.innerHTML = msg ? warningMsg(msg) : '';
}

function hasEmptyInputs() {
  let hasEmpty = false;
  let showingWarning = false;

  Object.keys(inputs).forEach((key) => {
    const { element, visited } = inputs[key];

    if (!element || element.readOnly || element.disabled) return;

    if (isEmpty(element)) {
      hasEmpty = true;

      if (visited) {
        showWarning(
          `${
            key.charAt(0).toUpperCase() + key.slice(1)
          } precisa ser preenchido!`
        );
        showingWarning = true;
      }
    }

    if (!showingWarning && visited && !isEmpty(element)) {
      showWarning();
    }
  });

  return hasEmpty;
}

function hasAlterableInputs() {
  let hasAlterable = false;

  Object.keys(inputs).forEach((key) => {
    if (
      inputs[key].element &&
      !inputs[key].element.readOnly &&
      !inputs[key].element.disabled
    )
      hasAlterable = true;
  });

  return hasAlterable;
}

window.onload = () => {
  Object.keys(inputs).forEach((key) => {
    if (inputs[key].element === null) return;

    inputs[key].element.addEventListener('blur', () => {
      if (inputs[key].element.readOnly || inputs[key].element.disabled) {
        return;
      }

      inputs[key].visited = true;
      btnEnviar.disabled = hasEmptyInputs();
    });
  });

  btnEnviar.disabled = hasAlterableInputs() && hasEmptyInputs();

  btnEnviar.addEventListener('click', (event) => {
    if (hasEmptyInputs()) {
      event.preventDefault();
    }
  });
};
