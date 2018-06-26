<?php

class CtrCervejaria {

	public static function createCervejaria() {
		$nomeCervejaria = $_POST['nomeCervejaria'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$pais = $_POST['pais'];
		$tipo = $_POST['tipo'];
		try {
			$db = Database::getDB();
			$query = 'INSERT INTO cervejaria (nome, cidade, estado, pais, tipo)
                VALUES (:nome, :cidade, :estado, :pais, :tipo)';
			$statement = $db->prepare($query);
			$statement->bindValue(":nome", $nomeCervejaria);
			$statement->bindValue(":cidade", $cidade);
			$statement->bindValue(":estado", $estado);
			$statement->bindValue(":pais", $pais);
			$statement->bindValue(":tipo", $tipo);
			if ($statement->execute()) {
				header("Location: ./?acao=cerveja.view");
			} else {
				$erro = 'Erro ao cadastrar a cervejaria.';
				include './view/add/addCervejaria.php';
			}
			$statement->closeCursor();
		} catch (PDOException $ex) {
			$erro = 'Erro ao cadastrar a cervejaria.';
			include './view/add/addCervejaria.php';
		}
	}

	public static function getCervejaria($id) {
		$db = Database::getDB();
		$query = 'SELECT * FROM cervejaria
                  WHERE id = :id';
		$statement = $db->prepare($query);
		$statement->bindValue(":id", $id);
		$statement->execute();
		$cervejaria;
		if ($row = $statement->fetch()) {
			$cervejaria = new Cervejaria($row['id'], $row['nome'], $row['cidade'], $row['estado'], $row['pais'], $row['avaliacao'], $row['tipo']);
		} else {
			$cervejaria = null;
		}
		$statement->closeCursor();
		return $cervejaria;
	}

	public static function getCervejariaByName($nomeCervejaria) {
		$db = Database::getDB();
		$query = 'SELECT * FROM cervejaria
                  WHERE nome = :nome';
		$statement = $db->prepare($query);
		$statement->bindValue(":nome", $nomeCervejaria);
		$statement->execute();
		$cervejaria;
		if ($row = $statement->fetch()) {
			$cervejaria = new Cervejaria($row['id'], $row['nome'], $row['cidade'], $row['estado'], $row['pais'], $row['avaliacao'], $row['tipo']);
		} else {
			$cervejaria = null;
		}
		$statement->closeCursor();
		return $cervejaria;
	}

	public static function getCervejasCervejaria($idCervejaria) {
		$db = Database::getDB();
		$query = 'SELECT cervejaria.id AS cervejariaId, cervejaria.nome AS cervejariaNome, 
			cervejaria.cidade AS cervejariaCidade, cervejaria.estado cervejariaEstado, 
			cervejaria.pais AS cervejariaPais, cervejaria.avaliacao AS cervejariaAvaliacao, 
			cervejaria.tipo AS cervejariaTipo, cerveja.id AS cervejaId, cerveja.nome AS cervejaId, 
			cerveja.teor AS cervejaTeor, cerveja.tipo AS cervejaTipo, 
			cerveja.avaliacao AS cervejaAvaliacao 
			FROM cervejaria INNER JOIN cerveja ON cervejaria.id = cerveja.idCervejaria
                  WHERE idCervejaria = :idCervejaria';
		$statement = $db->prepare($query);
		$statement->bindValue(":idCervejaria", $idCervejaria);
		$statement->execute();
		$cervejaria;
		$cont = 0;
		while ($row = $statement->fetch()) {
			$cont = 1;
			$cervejaria = new Cervejaria($row['cervejariaId'], $row['cervejariaNome'], $row['cervejariaCidade'], $row['cervejariaEstado'], $row['cervejariaPais'], $row['cervejariaAvaliacao'], $row['cervejariaTipo']);
			$cervejas[] = new Cerveja($row["cervejaId"], $row["cervejariaId"], $row["cervejaNome"], $row["cervejaTeor"], $row["cervejaAvaliacao"]);
		}
		if($cont == 1) {
			$retorno[0] = $cervejaria;
			$retorno[1] = $cervejas;
		} else {
			$retorno = null;
		}
		$statement->closeCursor();
		return $retorno;
	}

}
