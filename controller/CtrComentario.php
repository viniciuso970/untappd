<?php

class CtrComentario
{

    public static function getComentario($checkIn)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM comentario
                      WHERE idConta = :idConta
                      AND idCheckin = :idCheckin';
        $statement = $db->prepare($query);
        $statement->bindValue(":idConta", $conta->getId());
        $statement->bindValue(":idCheckin", $item['id']);
        $statement->execute();
        $comentario = array();
        while ($row = $statement->fetch() || $qtde < 4) {
            $item = new Comentario($row['id'], $row['idCheckin'], 
                $row['idConta'], $row['texto']);
            array_push($comentario, $item);
            $qtde++;
        }
        $statement->closeCursor();
        return $comentario;
    }

}
