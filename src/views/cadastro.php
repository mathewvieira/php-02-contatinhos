<section class="row">
    <div class="col">
        <div class="card card-body"> 
            <div id="erros">

            </div>

            <form action="" method="post">
                <label for="">Nome</label>
                <input id="input_nome" type="text" name="nome" class="form-control mb-3">

                <label for="">Email</label>
                <input type="text" name="email" class="form-control mb-3">

                <label for="">Telefone</label>
                <input type="text" name="telefone" class="form-control mb-3">

                <button id="btn_enviar"" class="btn btn-dark w-100">PRONTO</button>
            </form>
        </div>
    </div>
    <div class="col">

    </div>
</section>


<script>
    input_nome.addEventListener('blur', () => {
        if (input_nome.value === '') {
            erros.innerHTML = `<div class="alert alert-danger">Nome Invalido</div>`;

            input_nome.classList.add('is-invalid');
            btn_enviar.setAttribute('disabled', 'disabled');
        } else {
            erros.innerHTML = '';

            input_nome.classList.remove('is-invalid');
            input_nome.classList.add('is-valid');
            btn_enviar.removeAttribute('disabled');
        }
    });
</script>
