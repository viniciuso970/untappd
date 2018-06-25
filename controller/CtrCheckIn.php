<?php

class CtrCheckIn
{
    
    public static function doCheckIn($cerveja, $cervejaria) {
        $idCerveja = $cerveja->getId();
        $idConta = $_SESSION['user_id'];
        $nomeCerveja = $cerveja->getNome();
        $nomeCervejaria = $cervejaria->getNome();
        $nomeUsuario = $_SESSION['user_name'];
        $avaliacao = $_POST['avaliacao'];

        try {
            $db = Database::getDB();
            $query = 'INSERT INTO checkin 
                (idCerveja, idConta, nomeCerveja, nomeCervejaria, nomeUsuario, avaliacao)
            VALUES 
                (:idCerveja, :idConta, :nomeCerveja, :nomeCervejaria, :nomeUsuario, :avaliacao)';
            $statement = $db->prepare($query);
            $statement->bindValue(":idCerveja", $idCerveja);
            $statement->bindValue(":idConta", $idConta);
            $statement->bindValue(":nomeCerveja", $nomeCerveja);
            $statement->bindValue(":nomeCervejaria", $nomeCervejaria);
            $statement->bindValue(":nomeUsuario", $nomeUsuario);
            $statement->bindValue(":avaliacao", $avaliacao);
            if($statement->execute()) {
                header("Location: ./");
            } else {
                $erro = 'Erro ao fazer o checkin.';
                include './view/auth/checkin.php';
            }
        } catch (PDOException $ex) {
            $erro = 'Erro ao registrar o usuário. '.$ex->getMessage();
            include './view/auth/registro.php';
        }
    }

    public static function getFeed($conta) {
        $db = Database::getDB();
        $query = 'SELECT * FROM checkin
                  WHERE idConta = :idConta';
        $statement = $db->prepare($query);
        $statement->bindValue(":idConta", $conta->getId());
        $statement->execute();
        $feed = array();
        while($row = $statement->fetch()) {
            $checkIn = new CheckIn($row['id'], $row['idCerveja'], 
                        $row['idConta'], $row['nomeCerveja'], 
                        $row['nomeCervejaria'], $row['nomeUsuario'], 
                        $row['avaliacao'], $row['dataHora']);
            array_push($feed, $checkIn);
            include './view/feed.php';
            $comentario = CtrComentario::get5Comentarios($checkIn);
            include './view/comentario.php';
        }
        $statement->closeCursor();
    }

    public static function getCheckIn($conta) {
        $id = $_POST['idCheckIn'];
        $db = Database::getDB();
        $query = 'SELECT * FROM checkin
                  WHERE id = :idCheckIn
                  AND idConta = :idConta';
        $statement = $db->prepare($query);
        $statement->bindValue(":idConta", $conta->getId());
        $statement->bindValue(":idCheckIn", $id);
        $statement->execute();
        $feed = array();
        if($row = $statement->fetch()) {
            $checkIn = new CheckIn($row['id'], $row['idCerveja'], 
                        $row['idConta'], $row['nomeCerveja'], 
                        $row['nomeCervejaria'], $row['nomeUsuario'], 
                        $row['avaliacao'], $row['dataHora']);
            include './view/feed.php';
        } else {
            // Não sei como tratar erro #pas
        }
        $statement->closeCursor();
    }

}
