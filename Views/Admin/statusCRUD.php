<?php require_once "header.php";
        require_once "../../Models/StatusDAO.php";


$oper = "";
$id = 0;

if($_GET){

    $oper = $_GET["oper"];

    if($oper == "a"){

        $id = $_GET["id"];
        $status = new Status($id);
        $statusDAO = new StatusDAO();
        $retStatus = $statusDAO->oneStatus($status);
    }

    if($oper == "e"){

        $id = $_GET["id"];
        $status = new Status($id);
        $statusDAO = new StatusDAO();
        $retStatus = $statusDAO->deleteStatus($status);
        echo "<script>alert('Status excluído com sucesso!');
        window.location.href='status.php'</script>";
    }
}

if($_POST){

    switch($oper){
       
        case "i":
        $status = new Status(null, $_POST["status"]);
        $statusDAO = new StatusDAO();
        $statusDAO->insertStatus($status);
        echo "<script>alert('Status cadastrado com sucesso!');
        window.location.href='status.php'</script>";
        break;

        case "a":
        $status = new Status($id, $_POST["status"]);
        $statusDAO = new StatusDAO();
        $statusDAO->updateStatus($status);
        echo "<script>alert('Status alterado com sucesso!');
        window.location.href='status.php'</script>";
        break;
    }

}



?>

<main class="container py-5">
    <section>
    <a href="status.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>
        <h1>Status</h1>
        <hr>

        <form method="POST" action="#">

		<div class="form-group">
			<label>Status</label>
            <input type="text" name="status" class="form-control" 
            value="<?php if($oper == "a") echo $retStatus[0]->descriptive;?>" required>
		</div>

        <input type="submit" value="Salvar" class="btn btn-outline-primary">

        </form>

        
    </section>

</main>


<?php require_once "footer.php"?>