<?php require_once "header.php";
        require_once "../../Models/DeskDAO.php";

$oper = "";
$id = 0;

if($_GET){
    $oper = $_GET["oper"];
    if($oper == "a"){

        $id = $_GET["id"];
        $desk = new Desk($id);
        $deskDAO = new DeskDAO();
        $retDesk = $deskDAO->oneDesk($desk);
    }

    if($oper == "e"){
        $id = $_GET["id"];
        $desk = new Desk($id);
        $deskDAO = new DeskDAO();
        $retDesk = $deskDAO->deleteDesk($desk);
        echo "<script>alert('Mesa excluída com sucesso!');
        window.location.href='mesas.php'</script>";
    }
}

if($_POST){

    switch($oper){
       
        case "i":
        $desk = new Desk(null, $_POST["desk"]);
        $deskDAO = new DeskDAO();
        $deskDAO->insertDesk($desk); 
        echo "<script>alert('Mesa cadastrada com sucesso!');
        window.location.href='mesas.php'</script>";
        break;

        case "a":
        $desk = new Desk($id, $_POST["desk"]);
        $deskDAO = new DeskDAO();
        $deskDAO->updateDesk($desk); 
        echo "<script>alert('Mesa alterada com sucesso!');
        window.location.href='mesas.php'</script>";
        break;
    }

}



?>

<main class="container py-5">
    <section>
        <h1>Mesas</h1>
        <hr>

        <form method="POST" action="#">

		<div class="form-group">
			<label>Mesa</label>
            <input type="text" name="desk" class="form-control" value="<?php if($oper == "a") echo $retDesk[0]->descriptive;?>" required>
		</div>

        <input type="submit" value="Salvar" class="btn btn-outline-primary">

        </form>

        
    </section>

</main>

<?php require_once "footer.php";?>