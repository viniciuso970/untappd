<?php

class CtrCervejaria {

	public static function createCervejaria() {
		$nomeCervejaria = $_POST['nomeCervejaria'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$pais = $_POST['pais'];
		$tipo = $_POST['tipo'];
		if($nomeCervejaria === "" || $cidade === "" || $estado === "" || $pais === "") {
            $msg = 'Campos obrigatórios não preenchidos.';
			header("Location: ./?acao=cervejaria.form&msg=".$msg);
			exit; 
        } 
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
				$msg = 'Cervejaria cadastrada com sucesso.';
				header("Location: ./?acao=cerveja.form&msg=".$msg);
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
			$cervejaria = new Cervejaria($row['id'], $row['nome'], 
					$row['cidade'], $row['estado'], $row['pais'], 
					$row['avaliacao'], $row['tipo']);
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
			$cervejaria = new Cervejaria($row['id'], $row['nome'], 
					$row['cidade'], $row['estado'], $row['pais'], 
					$row['avaliacao'], $row['tipo']);
		} else {
			$cervejaria = null;
		}
		$statement->closeCursor();
		return $cervejaria;
	}

	public static function getCervejasCervejaria($idCervejaria) {
		$db = Database::getDB();
		$query = 'SELECT cervejaria.id AS cervejariaId, cerveja.id AS cervejaId, cerveja.nome AS cervejaNome, 
			cerveja.teor AS cervejaTeor, cerveja.tipo AS cervejaTipo, 
			cerveja.avaliacao AS cervejaAvaliacao 
			FROM cervejaria INNER JOIN cerveja ON cervejaria.id = cerveja.idCervejaria
                  WHERE idCervejaria = :idCervejaria';
		$statement = $db->prepare($query);
		$statement->bindValue(":idCervejaria", intVal($idCervejaria));
		$statement->execute();
		$cervejas = array();
		$cont = 0;
		while ($row = $statement->fetch()) {
			$cont = 1;
			$cerveja = new Cerveja($row["cervejaId"], $row["cervejariaId"], 
					$row["cervejaNome"], $row["cervejaTeor"], 
					$row["cervejaTipo"], $row["cervejaAvaliacao"]);
			array_push($cervejas, $cerveja);
		}
		if($cont == 0) {
			$cervejas = null;
		}
		$statement->closeCursor();
		return $cervejas;
	}

	public static function cervejariaUnicoTotal($cervejaria) {
		$unicoTotal = array();
		$cervejas = self::getCervejasCervejaria($cervejaria->getId());
		$unicoTotal = array();
		$unicoTotal[0] = 0;
		$unicoTotal[1] = 0;
		foreach($cervejas as $item) {
			$unicoTotalCerveja = CtrCerveja::cervejaUnicoTotal($item);
			$unicoTotal[0] += $unicoTotalCerveja[0];
			$unicoTotal[1] += $unicoTotalCerveja[1];
		}
        return $unicoTotal;
	}

}
