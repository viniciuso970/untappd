<?php

class CtrBadge {

	public static function listaBadges($idCheckin = NULL, $idConta) {
		$db = Database::getDB();
		$query = 'SELECT * FROM badge';
		$statement = $db->prepare($query);
		$statement->execute();
		$endereco = array();
		while ($row = $statement->fetch()) {
			$endereco[] = $row;
		}
		$statement->closeCursor();

		if ($idCheckin == NULL) {
			$retorno["retornaBadgeConta"] = self::retornaBadgeConta($idConta); // Todas as Badges da conta
			$retorno["endereco"] = $endereco; // Todos os endereços da conta
		} else {
			$retorno["retornaBadgeCheckin"] = self::retornaBadgeCheckin($idCheckin, $idConta); // Todas as Badges do Checkin
			$retorno["retornaBadgeConta"] = self::retornaBadgeConta($idConta); // Todas as Badges da conta
			$retorno["endereco"] = $endereco; // Todos os endereços da conta
		}
		return $retorno;
	}

	public static function retornaBadgeCheckin($idCheckin, $idConta) {
		$db = Database::getDB();
		$query = 'SELECT * FROM contabadgecheckin
                  WHERE idCheckIn = :idCheckin AND idConta = :idConta';
		$statement = $db->prepare($query);
		$statement->bindValue(":idCheckin", $idCheckin);
		$statement->bindValue(":idConta", $idConta);
		$statement->execute();
		$badges;
		if ($row = $statement->fetch()) {
			$badges = new ContaBadgeCheckIn($row["idConta"], $row["idCheckIn"], $row["badge1"], $row["badge2"], $row["badge3"], $row["badge4"], $row["badge5"], $row["badge6"], $row["badge7"], $row["badge8"], $row["badge9"], $row["badge10"]);
		} else {
			$badges = null;
		}
		$statement->closeCursor();
		return $badges;
	}

	public static function retornaBadgeConta($idConta) {
		$db = Database::getDB();
		$query = 'SELECT * FROM contabadgecheckin
                  WHERE idConta = :idConta';
		$statement = $db->prepare($query);
		$statement->bindValue(":idConta", $idConta);
		$statement->execute();
		$badges[] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		while ($row = $statement->fetch()) {
			if ($row["badge1"] != NULL) {
				$badges[0]++;
				continue;
			}
			if ($row["badge2"] != NULL) {
				$badges[1]++;
				continue;
			}
			if ($row["badge3"] != NULL) {
				$badges[2]++;
				continue;
			}
			if ($row["badge4"] != NULL) {
				$badges[3]++;
				continue;
			}
			if ($row["badge5"] != NULL) {
				$badges[4]++;
				continue;
			}
			if ($row["badge6"] != NULL) {
				$badges[5]++;
				continue;
			}
			if ($row["badge7"] != NULL) {
				$badges[6]++;
				continue;
			}
			if ($row["badge8"] != NULL) {
				$badges[7]++;
				continue;
			}
			if ($row["badge9"] != NULL) {
				$badges[8]++;
				continue;
			}
			if ($row["badge10"] != NULL) {
				$badges[9]++;
				continue;
			}
		}
		$statement->closeCursor();
		return $badges;
	}

}

?>
