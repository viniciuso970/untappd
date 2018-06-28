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
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/login_registro.css" />
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="navbar-left logo" src="assets/img/logo.jpg" alt="">
                <a class="navbar-brand" href="home.html">Untappd</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="nav navbar-brand" href="?acao=Login">
                        <span class="glyphicon glyphicon-user"></span>Login
                    </a>
                </li>
                <li>
                    <a href="?acao=Registro">
                        <span class="glyphicon glyphicon-log-in"></span>Registrar
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <img class="profile-img" src="assets/img/logo.jpg" alt="">
                    <form class="form-signin" action="?acao=auth.login" method="post">
                        <label class="text-danger"> <?php echo(CtrUtils::printMsg()); ?></label>
                        <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
                        <input name="senha" type="password" class="form-control" placeholder="Senha" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>