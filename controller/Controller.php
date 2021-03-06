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
                    CtrCheckIn::getFeed($conta, $conta->getId());
                    $amigos = CtrConta::getAmigos($conta);
                    foreach($amigos as $item) {
                        CtrCheckIn::getFeed($item, $conta->getId());
                    }
				} else if($_GET['acao'] === 'perfil') {
					$conta = CtrConta::getContaUsuario($_GET['usuario']);
					include './view/home.php';
					CtrCheckIn::getFeed($conta, $_SESSION['user_id']);
				} else if ($_GET['acao'] === "amigos") {
                    $listAmigos = CtrConta::getAmigos($conta);
                    $solicitacao = CtrConta::getSolicitacaoAmizade($conta);
                    include './view/amigos.php';
                    include './view/utils/sidebar.php';
                } 
                else if ($_GET['acao'] === "badges") {
                    include './view/home.php';
                    $isBadge = CtrBadge::retornaBadgeConta($conta->getId());
					include './view/badges.php';
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
                    $cerveja = CtrCerveja::getCerveja($_GET['nome']);
                    if($cerveja) {
                        $cervejaria = CtrCervejaria::getCervejaria($cerveja->getIdCervejaria());
                        $unicoTotal = CtrCerveja::cervejaUnicoTotal($cerveja);
                        include './view/consultaCerveja.php';
                        CtrCheckIn::getFeedCerveja($cerveja, $conta->getId());
                    } else {
                        $msg = 'Não existe cerveja com o nome'.$_GET['nome'].'.';
                        header("Location: ./?acao=homepage&msg=".$msg);
                    }
                }
                else if ($_GET['acao'] === "cervejaria.form") {
                    include './view/add/addCervejaria.php';
                    include './view/utils/sidebar.php';
                }
                else if ($_GET['acao'] === "cervejaria.add") {
                    CtrCervejaria::createCervejaria();
                }
                else if ($_GET['acao'] === "cervejaria.view") {
                    $cervejaria = CtrCervejaria::getCervejariaByName($_GET['nome']);
                    if($cervejaria) {
                        $unicoTotal = CtrCervejaria::cervejariaUnicoTotal($cervejaria);
                        $cervejas = CtrCervejaria::getCervejasCervejaria($cervejaria->getId());
                        include './view/consultaCervejaria.php';
                    } else {
                        $msg = 'Não existe cervejaria com o nome'.$_GET['nome'].'.';
                        header("Location: ./?acao=homepage&msg=".$msg);
                    }
                    
                } else if ($_GET['acao'] === "usuario.view") {
                    $conta = CtrConta::getContaUsuario($_GET['nome']);
                    if($conta) {
                        include './view/home.php';
                        CtrCheckIn::getFeed($conta, $_SESSION['user_id']);
                    }
                } else if ($_GET['acao'] === "checkIn.comentario") {
                    $checkIn = CtrCheckIn::getCheckIn();
                    $comentario = CtrComentario::getAllComentario($checkIn);
                    include './view/comentario.php';
                    $idComentador = $_SESSION['user_id'];
                    if(CtrConta::isAmigo($checkIn->getIdConta(), $idComentador)) {
                        include './view/formComentario.php';
                    } else {
                        echo '</div></div></div>';
                    }
                } else if ($_GET['acao'] === "comentar") {
                    CtrComentario::comentar();
					header("Location: ./?acao=homepage");
                } else if ($_GET["acao"] === "procura.amigo") {
                    $listAmigos = CtrConta::getAmigos($conta);
                    $solicitacao = CtrConta::getSolicitacaoAmizade($conta);
                    include './view/amigos.php';
                    include './view/utils/sidebar.php';
                } else if ($_GET["acao"] === "procura.usuario") {
                    $usuario = CtrConta::getContaUsuario($_POST['buscaUsuario']);
                    if($usuario) {
                        $solicitacao = CtrConta::getSolicitacaoAmizade($conta);
                        $listAmigos = CtrConta::getAmigos($conta);
                        if($usuario) {
                            $isAmigo = CtrConta::isAmigo($conta->getId(), $usuario->getId());
                        }
                        include './view/amigos.php';
                        include './view/utils/sidebar.php';
                    } else {
                        $msg = "Usuário não encontrado";
                        header("Location: ./?acao=amigos&msg=".$msg);
                    }
                } else if ($_GET["acao"] === "amizade.fazer") {
                    CtrConta::fazerAmizade($conta, $_POST['idUsuario']);
                    header("Location: ./?acao=amigos");
                } else if ($_GET["acao"] === "amizade.aceitar") {
                    CtrConta::aceitarAmizade($conta, $_POST['idUsuario']);
                    header("Location: ./?acao=amigos");
                } else if ($_GET["acao"] === "amizade.desfazer") {
                    CtrConta::desfazerAmizade($conta, $_POST['idUsuario']);
                    header("Location: ./?acao=amigos");
                } else if ($_GET["acao"] === "consulta") {
                    if ($_POST['opt'] === "optCerveja") {
                        header("Location: ./?acao=cerveja.view&nome=".$_POST['pesquisa']);
                    } else if($_POST['opt'] === "optCervejaria") {
                        header("Location: ./?acao=cervejaria.view&nome=".$_POST['pesquisa']);
                    } else {
                        $msg = 'Favor selecionar uma opção, consultar cervejas ou cervejarias.';
                        header("Location: ./?acao=homepage&msg=".$msg);
                    }
                }
            } else {
                include './view/home.php';
                CtrCheckIn::getFeed($conta, $_SESSION['user_id']);
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
