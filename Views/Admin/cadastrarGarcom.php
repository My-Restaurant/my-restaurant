<?php require_once "header.php";?>

<main>
    <section class="container py-5">
        <a href="principal.php" class="btn btn-outline-danger mb-5"><i class="fas fa-arrow-left mr-2 fa-1x"></i>Voltar</a>
        <h1>Cadastrar Garçom</h1>
        <hr>

        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Nome</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="usertype">Tipo de usuário</label>
                <select name="usertype" class="form-control" id="usertype">
                    <option value="0" selected>Selecione o tipo do usuario</option>
                    <option value="A">Administrador</option>
                    <option value="W">Garçom</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="passwd">Senha</label>
                <input type="password" id="passwd" name="passwd" class="form-control" required>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-danger btn-b" value="Confirmar">  
            </div>
        </form>
    </section>
</main>

<?php require_once "footer.php";?>

<?php 

    if($_POST){

        if(isset($_POST) && $_POST["usertype"] !== "0"){

            if($_POST["usertype"] == "W"){

                require_once "../../Models/WaiterDAO.php";

                $waiter = new Waiter(null, 10, null, 
                $_POST["username"], $_POST["cpf"], $_POST["usertype"],
                $_POST["email"], $_POST["passwd"]);

                $waiterDAO = new WaiterDAO();

                $ret = $waiterDAO->insertWaiter($waiter);

                echo "<script>
                    alert('Usuário cadastrado com sucesso!'); window.location.href = 'principal.php';
                </script>";

            } else {

                require_once "../../Models/AdminDAO.php";

                $admin = new Admin(null, $_POST["username"], 
                $_POST["cpf"], $_POST["usertype"],
                $_POST["email"], $_POST["passwd"]);

                $adminDAO = new AdminDAO();
                $adminDAO->insert($admin);

                echo "<script>
                    alert('Usuário cadastrado com sucesso!'); window.location.href = 'principal.php';
                </script>";

            }

        }
    }
?>