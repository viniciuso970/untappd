<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Untappd</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo.jpg">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/jquery/jquery.rateyo.min.css"/>
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/jquery/jquery.rateyo.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="navbar-left logo" src="assets/img/logo.jpg" alt="">
                <a class="navbar-brand" href="?acao=homepage">Untappd</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="nav navbar-brand" href="?acao=checkIn">Check in</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ($_SESSION['user_name']); ?>
                        </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?acao=homepage">Perfil</a>
                        </li>
                        <li>
                            <a href="?acao=amigos">Amigos</a>
                        </li>
                        <li>
                            <a href="?acao=badges">Badges</a>
                        </li>
                        <li>
                            <a href="?acao=logout">Logout</a>
                        </li>
                    </ul>
                </li>
                <form class="navbar-form navbar-left" action="?acao=consulta" method="post">
                    <div class="form-group">
                        <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <div class="radio">
                        <label><input type="radio" name="opt" value="optCerveja" checked>Cerveja</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="opt" value="optCervejaria">Cervejaria</label>
                    </div>
                </form>
            </ul>
        </div>
    </nav>