<?php

class CtrComentario
{

    public static function comentar() {
        $idCheckIn = $_POST['idCheckIn'];
        $idConta = $_POST['idConta'];
        $texto = $_POST['texto'];
        $db = Database::getDB();
        $query = 'INSERT INTO comentario (idCheckIn, idConta, texto)
                    VALUES (:idCheckIn, :idConta, :texto)';
        $statement = $db->prepare($query);
        $statement->bindValue(":idCheckIn", $idCheckIn);
        $statement->bindValue(":idConta", $idConta);
        $statement->bindValue(":texto", $texto);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get5Comentarios($checkIn)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM comentario
                      WHERE idCheckIn = :idCheckIn';
        $statement = $db->prepare($query);
        $statement->bindValue(":idCheckIn", $checkIn->getId());
        $statement->execute();
        $comentario = array();
        $qtde = 0;
        while (($row = $statement->fetch()) && $qtde < 5) {
            $item = new Comentario($row['id'], $row['idCheckIn'], 
                $row['idConta'], $row['texto']);
            array_push($comentario, $item);
            $qtde++;
        }
        $statement->closeCursor();
        return $comentario;
    }

    public static function getAllComentario($checkIn) {
        $db = Database::getDB();
        $query = 'SELECT * FROM comentario
                      WHERE idCheckIn = :idCheckIn';
        $statement = $db->prepare($query);
        $statement->bindValue(":idCheckIn", $checkIn->getId());
        $statement->execute();
        $comentario = array();
        while ($row = $statement->fetch()) {
            $item = new Comentario($row['id'], $row['idCheckIn'], 
                $row['idConta'], $row['texto']);
            array_push($comentario, $item);
        }
        $statement->closeCursor();
        return $comentario;
    }

}
