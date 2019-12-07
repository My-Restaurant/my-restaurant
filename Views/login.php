<?php 

    require_once "../Models/UserDAO.php";

    UserDAO::logout();

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/812210af5b.js" crossorigin="anonymous"></script>

    <title>Meu Restaurante</title>
</head>

<body class="bg-light">


        

        <div class="container pb-5">
            <div class="row justify-content-center align-items-center h-30">
                    <img src="img/logo.png" class="logo" alt="Logo Meu Restaurante">
            </div>
            
            <div class="row justify-content-center h-70">
                <div class="col-12 col-lg-8 col-xl-8">
                        <h1 class="mt-3 mb-5">Login</h1>
                        <form method="POST">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Insira seu e-mail">
                            </div>

                            <div class="form-group">
                                <label for="passwd">Senha</label>
                                <input type="password" name="passwd" class="form-control" id="passwd" placeholder="Insira sua senha">
                            </div>

                            <div class="from-group form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label for="check" class="form-check-label">Lembre-me</label>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-danger mt-3"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                </div>
            </div>
        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST["email"] != "" && $_POST["passwd"] != ""){

            $user = new User();
            $user->setValues($_POST);

            $userDAO = new UserDAO();
            
            if(!$userDAO->login($user)){
                echo "
                    <script>alert('Email ou senha incorretos')</script>
                ";
            } else {

                $url = "";

                ($_SESSION["userData"]->usertype === "A") ? $url = 'Admin/principal.php' : $url = 'principal.php';

                echo "
                    <script>window.location.href = '$url' </script>
                ";
            }
            
        } else {
            echo "
                <script>alert('Não mano')</script>
            ";
        }

    }

?>