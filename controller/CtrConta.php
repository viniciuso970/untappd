<?php

class CtrConta
{
    private $conta;

    public static function getConta($idConta) {
        $db = Database::getDB();
        $query = 'SELECT * FROM conta
                  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $idConta);
        $statement->execute();
        $conta;
        if($row = $statement->fetch()) {
            $conta = new Conta($row['id'], $row['email'], $row['senha'],
                $row['nome'], $row['usuario'], $row['total'], $row['unico']);
        } else {
            $conta = null;
        }
        $statement->closeCursor();
        return $conta;
    }

    public static function getCountAmigos($conta) {
        $db = Database::getDB();
        $query = 'SELECT * FROM amizade
                  WHERE id1 = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $conta->getId());
        $statement->execute();
        $amigos = $statement->rowCount();
        $statement->closeCursor();
        return $amigos;
    }

    public static function getAmigos($conta) {
        $db = Database::getDB();
        $query = 'SELECT * FROM conta INNER JOIN amizade 
        ON conta.id = amizade.id2 AND amizade.id1 = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $conta->getId());
        $statement->execute();
        $amigos = array();
        while($row = $statement->fetch()) {
            $conta = new Conta($row['id'], $row['email'], $row['senha'],
                $row['nome'], $row['usuario'],
                $row['total'], $row['unico']);
            array_push($amigos, $conta);
        }
        $statement->closeCursor();
        return $amigos;
    }

}
