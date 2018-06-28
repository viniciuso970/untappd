<div class="container col-md-7">
	<h1 class="col-md-12 pb-4 border-bottom"> Amigos</h1>
	<form class="mt-5 mb-5" action="?acao=procura.amigo" method="post">
		<div class="form-group">
			<div class="col-md-12">
				<input type="text" name="buscaAmigos" class="form-control col-md-5" id="buscaAmigos" placeholder="Procurar por amigos">
				<button class="btn btn-yellow col-md-3" type="submit"> Procurar Amigos</button>
			</div>
		</div>
	</form>
	<form class="mt-5" action="?acao=procura.usuario" method="post">
		<div class="form-group">
			<div class="mt-5 col-md-12">
				<input type="text" name="buscaUsuario" class="form-control col-md-5" id="buscaUsuario" placeholder="Procurar por usuários">
				<button class="btn btn-yellow col-md-3" type="submit"> Procurar Usuários</button>
			</div>
		</div>
	</form>
	<label class="col-md-12 mt-5 text-danger"> <?php echo(CtrUtils::printMsg()); ?></label>
	<?php 
	if($solicitacao) { ?>
	<h3 class="col-md-12 mt-5 pb-4 border-bottom"> Solicitações de amizade </h3>
	<div class="col-md-12 border">	
		<?php foreach ($solicitacao as $item) { ?>
		<form action="?acao=amizade.aceitar" method="post">
			<h4 class="col-md-3 pb-2 pt-2 border-right"> Nome: 
				<a class="text-info" href="?acao=perfil&usuario=<?= $item->getUsuario(); ?>"><?= $item->getNome(); ?> </a>
			</h4>
			<h4 class="col-md-3 pb-2 pt-2"> Usuário: 
				<a class="text-info" href="?acao=perfil&usuario=<?= $item->getUsuario(); ?>"><?= $item->getUsuario(); ?> </a>
			</h4>
			<input type="hidden" name="idUsuario" value="<?= $item->getId(); ?>">
			<button class="btn btn-primary col-md-2 mt-2 mb-2 mr-1" type="submit"> Aceitar </button>
		</form>
		<form action="?acao=amizade.desfazer" method="post">
			<input type="hidden" name="idUsuario" value="<?= $item->getId(); ?>">
			<button class="btn btn-danger col-md-2 mt-2 mb-2 ml-1" type="submit"> Rejeitar </button>
		</form>
	</div>
		<?php }
	} ?>
	
	<?php if ($_GET["acao"] === "procura.usuario") { ?>
	<h3 class="col-md-12 mt-5 pb-4 border-bottom"> Usuário</h3>
	<div class="col-md-12 border">	
		<form action="?acao=amizade.fazer" method="post">
			<h4 class="col-md-4 pb-2 pt-2 border-right"> Nome: 
				<a class="text-info" href="?acao=perfil&usuario=<?= $usuario->getUsuario(); ?>"><?= $usuario->getNome(); ?> </a>
			</h4>
			<h4 class="col-md-4 pb-2 pt-2"> Usuário: 
				<a class="text-info" href="?acao=perfil&usuario=<?= $usuario->getUsuario(); ?>"><?= $usuario->getUsuario(); ?> </a>
			</h4>
			<input type="hidden" name="idUsuario" value="<?= $usuario->getId(); ?>">
			<?php if(!$isAmigo) { ?>
				<button class="btn btn-primary col-md-4 mt-2 mb-2 p-3" type="submit"> Fazer Amizade </button>
			<?php } ?>
		</form>
	</div>
	<?php } ?>
	<h3 class="col-md-12 mt-5 pb-4 border-bottom"> Seus amigos</h3>
	<?php if ($_GET["acao"] !== "procura.amigo") {
		$cont = 0;
		foreach ($listAmigos as $item) {
			$cont++;
			?>
			<div class="col-md-12 border">
				<h4 class="col-md-4 pb-2 pt-2 border-right"> Nome: 
					<a class="text-info" href="?acao=perfil&usuario=<?= $item->getUsuario(); ?>"><?= $item->getNome(); ?> </a>
				</h4>
				<h4 class="col-md-4 pb-2 pt-2"> Usuário: 
					<a class="text-info" href="?acao=perfil&usuario=<?= $item->getUsuario(); ?>"><?= $item->getUsuario(); ?> </a>
				</h4>
				<form class="col-md-4" action="?acao=amizade.desfazer" method="post">
					<input type="hidden" name="idUsuario" value="<?= $item->getId(); ?>">
					<button class="btn btn-yellow mt-2 mb-2" type="submit"> Desfazer amizade </button>
				</form>
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
			if ($_POST["buscaAmigos"] === $item->getUsuario()) {
				$cont++;
				?>
				<div class="col-md-12 border">
					<h4 class="col-md-4 pb-2 pt-2 border-right"> Nome: 
						<a class="text-info" href="?acao=perfil.<?= $item->getUsuario(); ?>"><?= $item->getNome(); ?> </a>
					</h4>
					<h4 class="col-md-4 pb-2 pt-2"> Usuário: 
						<a class="text-info" href="?acao=perfil.<?= $item->getUsuario(); ?>"><?= $item->getUsuario(); ?> </a>
					</h4>
					<form class="col-md-4" action="?acao=amizade.desfazer" method="post">
						<input type="hidden" name="idUsuario" value="<?= $conta->getId(); ?>">
						<button class="btn btn-yellow mt-2 mb-2" type="submit"> Desfazer amizade </button>
					</form>
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