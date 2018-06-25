<?php

class Controller
{
    public static function router()
    {
        // Se o usuário estiver logado o router irá seguir essas rotas
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            $erro = '';
            $conta = CtrConta::getConta($_SESSION['user_id']);
            $amigos = CtrConta::getCountAmigos($conta);
            include './view/utils/header.php';
            if (isset($_GET['acao'])) {
                if ($_GET['acao'] === "logout") {
                    CtrAuth::logout();
                } 
                else if ($_GET['acao'] === "homepage") {
                    include './view/home.php';
                    CtrCheckIn::getFeed($conta);
                } 
                else if ($_GET['acao'] === "amigos") {
                    $listAmigos = CtrConta::getAmigos($conta);
                    include './view/amigos.php';
                    include './view/utils/sidebar.php';
                } 
                else if ($_GET['acao'] === "badges") {
                    include './view/home.php';
                    include './view/utils/sidebar.php';
                } 
                else if ($_GET['acao'] === "checkIn") {
                    include './view/checkin.php';
                    include './view/utils/sidebar.php';
                } 
                else if ($_GET['acao'] === "doCheckIn") {
                    $cerveja = CtrCerveja::getCerveja($_POST['cerveja']);
                    if ($cerveja) {
                        $cervejaria = CtrCervejaria::getCervejaria(
                            $cerveja->getIdCervejaria());
                        CtrCheckIn::doCheckIn($cerveja, $cervejaria);
                        include './view/home.php';
                        include './view/utils/sidebar.php';
                    } 
                    else {
                        header("Location: ./?acao=cerveja.view");
                    }
                }
                else if ($_GET['acao'] === "cerveja.view") {
                    include './view/add/addCerveja.php';
                    include './view/utils/sidebar.php';
                }
                else if ($_GET['acao'] === "cerveja.add") {
                    CtrCerveja::createCerveja();
                }
                else if ($_GET['acao'] === "cervejaria.view") {
                    include './view/add/addCervejaria.php';
                    include './view/utils/sidebar.php';
                }
                else if ($_GET['acao'] === "cervejaria.add") {
                    CtrCervejaria::createCervejaria();
                } 
            } else {
                include './view/home.php';
                include './view/feed.php';
            }
        } else { // Se o usuário não estiver logado
            //o router irá permanecer na página de registro ou login
            //até que o usuário se registre
            $erro = '';
            if (isset($_GET['acao'])) {
                if ($_GET['acao'] === "Login") {
                    include './view/auth/login.php';
                } 
                else if ($_GET['acao'] === "Registro") {
                    include './view/auth/registro.php';
                } 
                else if ($_GET['acao'] === "auth.registro") {
                    CtrAuth::registro();
                } 
                else if ($_GET['acao'] === "auth.login") {
                    CtrAuth::login();
                } 
            }else {
                include './view/auth/login.php';
            }
        }
    }

}
