<?php

class CtrCerveja
{
    
    public static function createCerveja() {
        $nomeCerveja = $_POST['nomeCerveja'];
        $teor = $_POST['teor'];
        $tipo = $_POST['tipo'];
        $nomeCervejaria = $_POST['cervejaria'];
        $cervejaria = CtrCervejaria::getCervejariaByName($nomeCervejaria);
        if($cervejaria) {
            $db = Database::getDB();
            $query = 'INSERT INTO cerveja (idCervejaria, nome, teor, tipo)
                VALUES (:idCervejaria, :nome, :teor, :tipo)';
            $statement = $db->prepare($query);
            $statement->bindValue(":idCervejaria", $cervejaria->getId());
            $statement->bindValue(":nome", $nomeCerveja);
            $statement->bindValue(":teor", $teor);
            $statement->bindValue(":tipo", $tipo);
            if($statement->execute()) {
                header("Location: ./?acao=ckeckIn");
            } else {
                $erro = 'Erro ao cadastrar a cerveja.';
                include './view/add/addCerveja.php';
            }
            $statement->closeCursor();
        } else {
            header("Location: ./?acao=cervejaria.view");
        }
    }

    public static function getCerveja($nome) {
        $db = Database::getDB();
        $query = 'SELECT * FROM cerveja
                  WHERE nome = :nome';
        $statement = $db->prepare($query);
        $statement->bindValue(":nome", $nome);
        $statement->execute();
        $cerveja;
        if($row = $statement->fetch()) {
            $cerveja = new Cerveja($row['id'], $row['idCervejaria'], $row['nome'],
                $row['teor'], $row['tipo'], $row['avaliacao']);
        } else {
            $cerveja = null;
        }
        $statement->closeCursor();
        return $cerveja;
    }

}
