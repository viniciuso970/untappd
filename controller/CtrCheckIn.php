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
                header("Location: ./?acao=homepage");
            } else {
                $msg = 'Erro ao fazer o checkin.';
                header("Location: ./?acao=checkIn&msg=".$msg);
            }
        } catch (PDOException $ex) {
            $msg = 'Erro ao fazer o checkin. '.$ex->getMessage();
            header("Location: ./?acao=checkIn&msg=".$msg);
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
            if($comentario) {
                include './view/comentario.php';
            }
            include './view/formComentario.php';
        }
        $statement->closeCursor();
    }

    public static function getCheckIn() {
        $id = $_POST['idCheckIn'];
        $idConta = $_POST['idConta'];
        try{
            $db = Database::getDB();
            $query = 'SELECT * FROM checkin
                    WHERE id = :idCheckIn
                    AND idConta = :idConta';
            $statement = $db->prepare($query);
            $statement->bindValue(":idConta", $idConta);
            $statement->bindValue(":idCheckIn", $id);
            $statement->execute();
            $feed = array();
            $row = $statement->fetch();
            $checkIn = new CheckIn($row['id'], $row['idCerveja'], 
                        $row['idConta'], $row['nomeCerveja'], 
                        $row['nomeCervejaria'], $row['nomeUsuario'], 
                        $row['avaliacao'], $row['dataHora']);
            include './view/feed.php';
            $statement->closeCursor();
            return $checkIn;
        } catch (PDOException $ex) {
            $msg = 'Erro ao buscar o checkIn: '.$ex->getMessage();
            header("Location: ./?acao=homepage&msg=".$msg);
            
        }
    }

}
