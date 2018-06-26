<div class="container col-md-7">
        <h1 class="col-md-12 pb-4 border-bottom"> Cadastrar Cervejaria </h1>
        <form class="mt-5" action="?acao=cervejaria.add" method="post">
            <h4 class="pl-5 col-md-5 text-danger"> <?php echo(CtrUtils::printMsg()); ?></h4>
            <div class="col-md-12 mb-3">
                <label for="nomeCervejaria" class="col-md-3 col-form-label">Nome da Cervejaria: </label>
                <div class="col-md-4">
                    <input name="nomeCervejaria" type="text" class="form-control" id="nomeCervejaria" placeholder="Nome da Cervejaria" required>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="cidade" class="col-md-3 col-form-label">Cidade da Cervejaria: </label>
                <div class="col-md-4">
                    <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade da Cervejaria" required>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="estado" class="col-md-3 col-form-label"> Estado da Cervejaria: </label>
                <div class="col-md-4">
                    <input name="estado" type="text" class="form-control" id="estado" placeholder="Estado da Cervejaria" required>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="pais" class="col-md-3 col-form-label"> País da Cervejaria: </label>
                <div class="col-md-4">
                    <input name="pais" type="text" class="form-control" id="pais" placeholder="País da Cervejaria" required>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="tipo" class="col-md-3 col-form-label">Tipo: </label>
                <div class="col-md-4">
                    <select name="tipo" class="col-form-label custom-select" id="tipo">
                        <option value="macro">Macro</option>
                        <option value="micro">Micro</option>
                        <option value="artesanal">Artesanal</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-lg btn-yellow col-md-6" type="submit">
                Cadastrar
            </button>
        </form>
    </div>
