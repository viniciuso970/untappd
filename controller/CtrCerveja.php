<?php

class CtrCerveja
{
    
    public static function createCerveja() {
        $nomeCerveja = $_POST['nomeCerveja'];
        $teor = $_POST['teor'];
        $tipo = $_POST['tipo'];
        $nomeCervejaria = $_POST['cervejaria'];
        if($nomeCerveja === "" || $teor === "" || $nomeCervejaria === "") {
            $msg = 'Campos obrigatórios não preenchidos.';
            header("Location: ./?acao=cerveja.form&msg=".$msg);
            exit;
        } 
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
                $msg = 'Cerveja cadastrada com sucesso.';
                header("Location: ./?acao=checkIn&msg=".$msg);
            } else {
                $msg = 'Erro ao cadastrar a cerveja.';
                header("Location: ./?acao=cerveja.form&msg=".$msg);
            }
            $statement->closeCursor();
        } else {
            $msg = 'A cervejaria '.$nomeCervejaria.' não existe';
            header("Location: ./?acao=cervejaria.form&msg=".$msg);
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
