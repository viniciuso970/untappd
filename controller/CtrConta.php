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

    public static function getContaUsuario($usuario) {
        $db = Database::getDB();
        $query = 'SELECT * FROM conta
                  WHERE usuario = :usuario';
        $statement = $db->prepare($query);
        $statement->bindValue(":usuario", $usuario);
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
                  WHERE (id1 = :id or id2 = :id) and confirmed = 1;';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $conta->getId());
        $statement->execute();
        $amigos = $statement->rowCount();
        $statement->closeCursor();
        return $amigos;
    }

    public static function isAmigo($idUsuario, $idAmigo) {
        $db = Database::getDB();
        $query = 'SELECT * FROM amizade 
                WHERE (id1 = :id1 AND id2 = :id2) or
                (id1 = :id2 AND id2 = :id1) and confirmed=1';
        $statement = $db->prepare($query);
        $statement->bindValue(":id1", $idAmigo);
        $statement->bindValue(":id2", $idUsuario);
        $statement->execute();
        if($row = $statement->fetch()) {
            $statement->closeCursor();
            return true;
        } 
        $statement->closeCursor();
        return false;
    }

    public static function fazerAmizade($usuario, $idAmigo) {
        $db = Database::getDB();
        $query = 'INSERT INTO amizade (id1, id2, confirmed)
                    VALUES (:id1, :id2, 0)';
        $statement = $db->prepare($query);
        $statement->bindValue(":id1", $idAmigo);
        $statement->bindValue(":id2", $usuario->getId());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function aceitarAmizade($usuario, $idAmigo) {
        $db = Database::getDB();
        $query = 'UPDATE amizade SET confirmed = 1
                    WHERE id1 = :id1 AND id2 = :id2';
        $statement = $db->prepare($query);
        $statement->bindValue(":id1", $usuario->getId());
        $statement->bindValue(":id2", $idAmigo);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function desfazerAmizade($usuario, $idAmigo) {
        $db = Database::getDB();
        $query = 'DELETE FROM amizade
                    WHERE (id1 = :id1 AND id2 = :id2)
                    OR (id1 = :id2 AND id2 = :id1)';
        $statement = $db->prepare($query);
        $statement->bindValue(":id1", $usuario->getId());
        $statement->bindValue(":id2", $idAmigo);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getAmigos($conta) {
        $db = Database::getDB();
        $query = 'SELECT * FROM conta INNER JOIN amizade 
        ON ((conta.id = amizade.id2 AND amizade.id1 = :id) or 
        (conta.id = amizade.id1 AND amizade.id2 = :id)) and confirmed=1';
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

    public static function getSolicitacaoAmizade($conta) {
        $db = Database::getDB();
        $query = 'SELECT * FROM conta INNER JOIN amizade 
        ON (conta.id = amizade.id2 AND amizade.id1 = :id) and confirmed=0';
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
