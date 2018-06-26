    <div class="container col-md-7">
        <h1 class="col-md-12 pb-4 border-bottom"> Check in</h1>
        <h4 class="col-md-12 text-danger"> <?php echo(CtrUtils::printMsg()); ?></h4>
        <form id="form" class="mt-5" action="?acao=doCheckIn" method="post">
            <label for="nomeCerveja" class="col-sm-3 col-form-label">Nome da Cerveja: </label>
            <div class="col-sm-4">
                <input name="cerveja" type="text" class="form-control" id="nomeCerveja" placeholder="Cerveja">
            </div>
            <div class="col-md-12 pt-5 pb-5">
                <div id="rateYo">
                </div>
            </div>
            <input name="avaliacao" id="avaliacao" type="hidden">
            <button class="btn btn-lg btn-yellow col-sm-3" type="submit">
                Enviar
            </button>
        </form>
        <script>
            $(function () {
                var $rateYo = $("#rateYo").rateYo();
                var $avaliacao = $("#avaliacao");
                $("#rateYo").rateYo("option", "onSet", function () {
                    $avaliacao.val($rateYo.rateYo("rating"));
                });
            });
        </script>
    </div>
