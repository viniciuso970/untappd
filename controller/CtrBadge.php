<?php

class CtrBadge
{

    public static function listaBadges($idCheckin = null, $idConta)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM badge';
        $statement = $db->prepare($query);
        $statement->execute();
        $endereco = array();
        while ($row = $statement->fetch()) {
            $endereco[] = $row;
        }
        $statement->closeCursor();

        if ($idCheckin == null) {
            $retorno["retornaBadgeConta"] = self::retornaBadgeConta($idConta); // Todas as Badges da conta
            $retorno["endereco"] = $endereco; // Todos os endereços da conta
        } else {
            $retorno["retornaBadgeCheckin"] = self::retornaBadgeCheckin($idCheckin, $idConta); // Todas as Badges do Checkin
            $retorno["retornaBadgeConta"] = self::retornaBadgeConta($idConta); // Todas as Badges da conta
            $retorno["endereco"] = $endereco; // Todos os endereços da conta
        }
        return $retorno;
    }

    public static function retornaBadgeCheckin($idCheckin, $idConta)
    {
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

    public static function retornaBadgeConta($idConta)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM contabadgecheckin
                  WHERE idConta = :idConta';
        $statement = $db->prepare($query);
        $statement->bindValue(":idConta", $idConta);
        $statement->execute();
        $badges = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        while ($row = $statement->fetch()) {
            if ($row["badge1"] != null) $badges[0]++;
            if ($row["badge2"] != null) $badges[1]++;
            if ($row["badge3"] != null) $badges[2]++;
            if ($row["badge4"] != null) $badges[3]++;
            if ($row["badge5"] != null) $badges[4]++;
            if ($row["badge6"] != null) $badges[5]++;
            if ($row["badge7"] != null) $badges[6]++;
            if ($row["badge8"] != null) $badges[7]++;
            if ($row["badge9"] != null) $badges[8]++;
            if ($row["badge10"] != null) $badges[9]++;
        }
        $statement->closeCursor();
        return $badges;
    }

    public static function getTotalBadge($idConta)
    {
        $badges = self::retornaBadgeConta($idConta);
        $total = 0;
        foreach ($badges as $item) {
            $total += $item;
        }
        return $total;
    }

}
