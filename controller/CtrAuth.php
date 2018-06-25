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
            echo "Conectado com sucesso!";
            header("Location: ./?acao=homepage");
        } else {
            $erro = 'Email ou senha errados!';
            include './view/auth/login.php';
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
                echo "Usuário registrado com sucesso!";
                header("Location: ./?acao=auth.Login");
            } else {
                $erro = 'Erro ao registrar o usuário.';
                include './view/auth/registro.php';
            }
        } catch (PDOException $ex) {
            $erro = 'Erro ao registrar o usuário. '.$ex->getMessage();
            include './view/auth/registro.php';
        }
    }

    public static function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        header("Location: ./?acao=auth.Login");
    }
}
