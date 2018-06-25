<?php

class CtrCervejaria
{
    
    public static function createCervejaria() {
        $nomeCervejaria = $_POST['nomeCervejaria'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $tipo = $_POST['tipo'];
        try {
            $db = Database::getDB();
            $query = 'INSERT INTO cervejaria (nome, cidade, estado, pais, tipo)
                VALUES (:nome, :cidade, :estado, :pais, :tipo)';
            $statement = $db->prepare($query);
            $statement->bindValue(":nome", $nomeCervejaria);
            $statement->bindValue(":cidade", $cidade);
            $statement->bindValue(":estado", $estado);
            $statement->bindValue(":pais", $pais);
            $statement->bindValue(":tipo", $tipo);
            if($statement->execute()) {
                header("Location: ./?acao=cerveja.view");
            } else {
                $erro = 'Erro ao cadastrar a cervejaria.';
                include './view/add/addCervejaria.php';
            }
            $statement->closeCursor();
        } catch (PDOException $ex) {
            $erro = 'Erro ao cadastrar a cervejaria.';
            include './view/add/addCervejaria.php';
        }
    }

    public static function getCervejaria($id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM cervejaria
                  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $cervejaria;
        if($row = $statement->fetch()) {
            $cervejaria = new Cervejaria($row['id'], $row['nome'], $row['cidade'],
                $row['estado'], $row['pais'], $row['avaliacao'], $row['tipo']);
        } else {
            $cervejaria = null;
        }
        $statement->closeCursor();
        return $cervejaria;
    }

    public static function getCervejariaByName($nomeCervejaria) {
        $db = Database::getDB();
        $query = 'SELECT * FROM cervejaria
                  WHERE nome = :nome';
        $statement = $db->prepare($query);
        $statement->bindValue(":nome", $nomeCervejaria);
        $statement->execute();
        $cervejaria;
        if($row = $statement->fetch()) {
            $cervejaria = new Cervejaria($row['id'], $row['nome'], $row['cidade'],
                $row['estado'], $row['pais'], $row['avaliacao'], $row['tipo']);
        } else {
            $cervejaria = null;
        }
        $statement->closeCursor();
        return $cervejaria;
    }

}
