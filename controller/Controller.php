<?php

class Controller
{
    public static function router()
    {
        // Se o usuário estiver logado o router irá seguir essas rotas
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            $conta = CtrConta::getConta($_SESSION['user_id']);
            if(!$conta) {
                CtrAuth::logout();
            }
            $amigos = CtrConta::getCountAmigos($conta);
            $badges = CtrBadge::getTotalBadge($conta->getId());
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
                        $msg = "Cerveja não cadastrada";
                        header("Location: ./?acao=cerveja.form&msg=".$msg);
                    }
                }
                else if ($_GET['acao'] === "cerveja.form") {
                    include './view/add/addCerveja.php';
                    include './view/utils/sidebar.php';
                }
                else if ($_GET['acao'] === "cerveja.add") {
                    CtrCerveja::createCerveja();
                }
                else if ($_GET['acao'] === "cerveja.view") {
                    
                }
                else if ($_GET['acao'] === "cervejaria.form") {
                    include './view/add/addCervejaria.php';
                    include './view/utils/sidebar.php';
                }
                else if ($_GET['acao'] === "cervejaria.add") {
                    CtrCervejaria::createCervejaria();
                }
                else if ($_GET['acao'] === "cervejaria.view") {

                } else if ($_GET['acao'] === "checkIn.comentario") {
                    $checkIn = CtrCheckIn::getCheckIn();
                    $comentario = CtrComentario::getAllComentario($checkIn);
                    include './view/comentario.php';
                    include './view/formComentario.php';
                } else if ($_GET['acao'] === "comentar") {
                    CtrComentario::comentar();
                    /*
                        Após comentar não sei o que fazer
                    */
                    //header("Location: ./?acao=homepage");
                } else if ($_GET["acao"] === "procura.amigo") {
					$listAmigos = CtrConta::getAmigos($conta);
                    include './view/amigos.php';
                    include './view/utils/sidebar.php';
				}
            } else {
                include './view/home.php';
                CtrCheckIn::getFeed($conta);
            }
            include './view/utils/footer.php';
        } else { // Se o usuário não estiver logado
            //o router irá permanecer na página de registro ou login
            //até que o usuário se registre
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
