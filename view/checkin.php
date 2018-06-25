    <div class="container col-md-7">
        <h1 class="col-md-12 pb-4 border-bottom"> Check in</h1>
        <form class="mt-5" action="?acao=doCheckIn" method="post">
            <label class="text-danger"> <?php echo($erro); ?></label>
            <label for="nomeCerveja" class="col-sm-3 col-form-label">Nome da Cerveja: </label>
            <div class="col-sm-4">
                <input name="cerveja" type="text" class="form-control" id="nomeCerveja" placeholder="Cerveja">
            </div>
            <div class="col-md-12 pt-5 ml-3">
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="Excelente">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="Boa">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="Média">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="Razoavel">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="Ruim">1 star</label>
                </div>
            </div>
            <button class="btn btn-lg btn-yellow col-sm-3" type="submit">
                Enviar
            </button>
        </form>
    </div>
