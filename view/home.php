    <div class="container col-md-11">
        <h1 class="col-md-6 pb-4 border-bottom"> <?= $conta->getNome(); ?></h1>
        <div class="col-md-6 pt-4">
            <?php
                if( $_SESSION['user_name'] !=  $conta->getUsuario()){
                    // fazer os botões chamarem as funções
                    $idConta = $conta->getId();
                    $db = Database::getDB();
                    $query = 'SELECT * FROM amizade
                    WHERE (id1=:id1 and id2=:id2) or (id1=:id2 and id2=:id1)';
                    $statement = $db->prepare($query);
                    $statement->bindValue(":id1", $idConta);
                    $statement->bindValue(":id2", $_SESSION['id']);//se não tiver essa variavel de sessao, tem que criar
                    $statement->execute();  
                    $solicitacao = 0;
                    $amigo = 0;
                    if($row = $statement->fetch()) {
                        $solicitacao=1;
                        if($row['confirmed'] = 1) {$amigo=1;}
                    } 
                    $statement->closeCursor();
                    if(!$amigo){
                        if(!$solicitacao){
                            echo "<button class=\"btn btn-yellow col-md-4\" type=\"submit\"> Adicionar Amigo </button>";                            
                            $query = 'INSERT INTO amizade (id1, id2, confirmed) VALUES (:id1, :id2, 0);';
                        }
                        else{
                            echo "<button class=\"btn btn-yellow col-md-4\" type=\"submit\"> Adicionar </button>";

                            $query = 'Update amizade set confirmed=1 where id1=:id2 and id2=:id1;';
                           
                            echo "<button class=\"btn btn-yellow col-md-4\" type=\"submit\"> Rejeitar </button>";
                            $query = 'DELETE FROM amizade WHERE id1=:id2 and id2=:id1;';
                        }
                        $statement = $db->prepare($query);
                        $statement->bindValue(":id1", $idConta);
                        $statement->bindValue(":id2", $_SESSION['id']);//idUsuario
                        $statement->execute();                        
                        $statement->closeCursor();
                    }
                    else {
                        echo "<button class=\"btn btn-yellow col-md-4\" type=\"submit\"> Desfazer Amizade </button>";
                        $query = 'DELETE FROM amizade WHERE (id1=:id1 and id2=:id2) or (id1=:id2 and id2=:id1) ;';
                        $statement = $db->prepare($query);
                        $statement->bindValue(":id1", $idConta);
                        $statement->bindValue(":id2", $_SESSION['id']);//idUsuario
                        $statement->execute();                        
                        $statement->closeCursor();
                    }

                }
            ?>
        </div>
        <h3 class="col-md-12"> <?= $conta->getUsuario(); ?> </h3>
        <h4 class="col-md-3 p-3 border text-center"> <?= $conta->getTotal(); ?> Total </h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $conta->getUnico(); ?> Único</h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $amigos; ?> Amigos</h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $badges; ?> Badges </h4>
    </div>

    <div class="col-md-12 pl-5">
        <h3 class="text-danger"> <?php echo(CtrUtils::printMsg()); ?></h3>
    </div>