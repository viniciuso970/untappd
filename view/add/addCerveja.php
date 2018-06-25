    <div class="container col-md-7">
        <h1 class="col-md-12 pb-4 border-bottom"> Cadastrar Cerveja</h1>
        <form class="mt-5" action="?acao=cerveja.add" method="post">
            <label class="text-danger"> <?php echo($erro); ?></label>
            <div class="col-md-12 mb-3">
                <label for="nomeCerveja" class="col-md-3 col-form-label">Nome da Cerveja: </label>
                <div class="col-md-4">
                    <input name="nomeCerveja" type="text" class="form-control" id="nomeCerveja" placeholder="Nome da Cerveja">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="teor" class="col-md-3 col-form-label">Teor: </label>
                <div class="col-md-4">
                    <input name="teor" type="text" class="form-control" id="teor" placeholder="Teor alcoólico da Cerveja">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="tipo" class="col-md-3 col-form-label">Tipo: </label>
                <div class="col-md-4">
                    <select name="tipo" class="col-form-label custom-select" id="tipo">
                        <option value="pilsen">Pilsen</option>
                        <option value="lager">Lager</option>
                        <option value="stout">Stout</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="cervejaria" class="col-md-3 col-form-label">Cervejaria: </label>
                <div class="col-md-4">
                    <input name="cervejaria" type="text" class="form-control" id="cervejaria" placeholder="Nome da Cervejaria">
                </div>
                <button class="btn btn-info col-md-3">
                    Verificar Cervejaria
                </button>
            </div>
            <button class="btn btn-lg btn-yellow col-md-6" type="submit">
                Cadastrar
            </button>
        </form>
    </div>
