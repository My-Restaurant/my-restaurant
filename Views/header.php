<?php 
    
    !isset($_SESSION) ? session_start() : null;
    require_once "../Models/UserDAO.php";
    UserDAO::verifyLogin();

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/812210af5b.js" crossorigin="anonymous"></script>

    <title>Meu Restaurante</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <span>Garçom <b><?= ucfirst($_SESSION["userData"]->username);?></b></span>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="anotarPedido.php">Anotar pedido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="consultarPedido.php">Consultar pedido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Sair</a>
                        </li>
                </div>
            </div>
        </nav>
    </header>