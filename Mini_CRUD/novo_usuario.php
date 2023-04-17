<h1>Novo Usuário</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label class="form-label">Nome </label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="">
    </div>
    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="">
    </div>
    <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="">
    </div>
    <div class="mb-3">
        <label class="form-label">data de Nascimento</label>
        <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
    </div>

    <button type="submit" class="btn btn-primary ">Enviar</button>
</form>