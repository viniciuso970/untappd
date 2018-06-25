<?php

class CtrComentario
{

    public static function get5Comentarios($checkIn)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM comentario
                      WHERE idCheckin = :idCheckIn';
        $statement = $db->prepare($query);
        $statement->bindValue(":idCheckIn", $checkIn->getId());
        $statement->execute();
        $comentario = array();
        $qtde = 0;
        while ($row = $statement->fetch() && $qtde < 4) {
            $item = new Comentario($row['id'], $row['idCheckin'], 
                $row['idConta'], $row['texto']);
            array_push($comentario, $item);
            $qtde++;
        }
        $statement->closeCursor();
        return $comentario;
    }

}
