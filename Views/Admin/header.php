<?php 

    require_once "../../Models/UserDAO.php";

    UserDAO::verifyLogin(true);

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/consultarPedido.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/812210af5b.js" crossorigin="anonymous"></script>

    <title>Meu Restaurante</title>
</head>

<body class="bg-light">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <span class="text-white">Administrador <b><?= ucfirst($_SESSION["userData"]->username);?></b></span>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="principal.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mesaFinalizar.php">Finalizar Pedido</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categorias.php">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mesas.php">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>