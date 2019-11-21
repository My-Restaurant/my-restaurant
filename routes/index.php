<?php 
    require_once "../Models/AdminDAO.php";
    require_once "../Models/Admin.php";
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Categorias</title>
</head>
<body>

    <h1>Cadastrar Categoria</h1>
    <form action="#" method="POST">
        <p>
            <label for="name">Username</label>
            <input type="text" name="name">
        </p>

        <p>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf">
        </p>

        <p>
            <label for="type">Usertype</label>
            <select name="type" id="type">
                <option value="W">Waiter</option>
                <option value="A">Admin</option>
            
            </select>
        </p>

        <p>
            <label for="email">email</label>
            <input type="text" name="email">
        </p>

        <p>
            <label for="password">password</label>
            <input type="password" name="password">
        </p>

        <p>
            <input type="submit" value="Cadastrar">
        </p>
    </form>
    
</body>
</html>

<?php

if($_POST){

    $admin = new Admin(null, $_POST["name"], $_POST["cpf"], $_POST["type"], $_POST["email"], $_POST["password"]);

    $adminDAO = new AdminDAO();
    
    $adminDAO->insert($admin);


}

?>