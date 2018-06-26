<div class="container col-md-7">
	<h1 class="col-md-12 pb-4 border-bottom"> Amigos</h1>
	<form class="mt-5" action="?acao=procura.amigo" method="post">
		<div class="form-group">
			<div class="col-sm-12">
				<input type="text" name="buscaAmigos" class="form-control col-md-5" id="buscaAmigos" placeholder="Procurar por amigos">
				<button class="btn btn-yellow col-md-2" type="submit"> Procurar </button>
			</div>
		</div>
	</form>
	<h3 class="col-md-12 mt-5 pb-4 border-bottom"> Seus amigos</h3>
	<?php
	if ($_GET["acao"] === "amigos") {
		$cont = 0;
		foreach ($listAmigos as $item) {
			$cont++;
			?>
			<div class="col-md-12 border">
				<h4 class="col-md-4 pb-2 pt-2 border-right"> Nome: 
					<a class="text-info" href="?acao=perfil.<?= $item->getUsuario(); ?>"><?= $item->getNome(); ?> </a>
				</h4>
				<h4 class="col-md-4 pb-2 pt-2"> Usuário: 
					<a class="text-info" href="?acao=perfil.<?= $item->getUsuario(); ?>"><?= $item->getUsuario(); ?> </a>
				</h4>
			</div>
		<?php } ?>
		<?php
		 if ($cont == 0) { ?>
			<h4 class="col-md-12 pb-2 pt-2 border-right"> Não possui nenhum amigo </h4>
	<?php }
	} else if ($_GET["acao"] === "procura.amigo") {
		$cont = 0;
		foreach ($listAmigos as $item) {
			?>
			<?php
			if ($_POST["buscaAmigos"] === $item->getNome) {
				$cont++;
				?>
				<div class="col-md-12 border">
					<h4 class="col-md-4 pb-2 pt-2 border-right"> Nome: 
						<a class="text-info" href="?acao=perfil.<?= $item->getUsuario(); ?>"><?= $item->getNome(); ?> </a>
					</h4>
					<h4 class="col-md-4 pb-2 pt-2"> Usuário: 
						<a class="text-info" href="?acao=perfil.<?= $item->getUsuario(); ?>"><?= $item->getUsuario(); ?> </a>
					</h4>
				</div>
			<?php } ?>
	<?php } ?>
		<?php if ($cont == 0) { ?>
			<h4 class="col-md-12 pb-2 pt-2 border-right"> Não há nenhum amigo com o nome: <?= $_POST["buscaAmigos"];?> 
			</h4>
	<?php }
} ?>
</div>
</body>

</html>