<?php

class CtrAuth
{

    public static function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $db = Database::getDB();
        $query = 'SELECT * FROM conta
                  WHERE email = :email AND senha = :senha';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":senha", $senha);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        if ($row) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['usuario'];
            header("Location: ./?acao=homepage");
        } else {
            $msg = 'Email ou senha errados!';
            header("Location: ./?acao=Login&msg=".$msg);
        }
    }

    public static function registro()
    {
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {

            $db = Database::getDB();
            $query = 'INSERT INTO conta (email, senha, nome, usuario)
            VALUES (:email, :senha, :nome, :usuario)';
            $statement = $db->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":senha", $senha);
            $statement->bindValue(":nome", $nome);
            $statement->bindValue(":usuario", $usuario);
            if($statement->execute()) {
                $msg = 'Usuário registrado com sucesso!';
                header("Location: ./?acao=Login&msg=".$msg);
            } else {
                $msg = 'Erro ao registrar o usuário.';
                header("Location: ./?acao=Registro&msg=".$msg);
            }
        } catch (PDOException $ex) {
            $msg = 'Erro ao registrar o usuário. '.$ex->getMessage();
            header("Location: ./?acao=Registro&msg=".$msg);
        }
    }

    public static function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        $msg = 'Sessão finalizada.';
        header("Location: ./?acao=Login&msg=".$msg);
    }
}
