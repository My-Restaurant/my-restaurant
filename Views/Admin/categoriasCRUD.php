<?php require_once "header.php";
        require_once "../../Models/CategoryDAO.php";

$oper = "";
$id = 0;

if($_GET){
    $oper = $_GET["oper"];
    if($oper == "a"){
        $id = $_GET["id"];
        $category = new Category($id);
        $categoryDAO = new CategoryDAO();
        $returnCat = $categoryDAO->oneCategory($category);
    }

    if($oper == "e"){
        $id = $_GET["id"];
        $category = new Category($id);
        $categoryDAO = new CategoryDAO();
        $returnCat = $categoryDAO->deleteCategory($category);
        echo "<script>alert('Categoria excluída com sucesso!');
        window.location.href='categorias.php'</script>";
    }
}

if($_POST){

    switch($oper){
       
        case "i":
        $category = new Category(null, $_POST["category"]);
        $categoryDAO = new CategoryDAO();
        $returnCat = $categoryDAO->insertCategory($category);
        echo "<script>alert('Categoria cadastrada com sucesso!');
        window.location.href='categorias.php'</script>";
        break;

        case "a":
        $category = new Category($id, $_POST["category"]);
        $categoryDAO = new CategoryDAO();
        $returnCat = $categoryDAO->updateCategory($category);
        echo "<script>alert('Categoria alterada com sucesso!');
        window.location.href='categorias.php'</script>";
        break;
    }

}



?>

<main class="container py-5">
    <section>
        <h1>Categorias</h1>
        <hr>

        <form method="POST" action="#">

		<div class="form-group">
			<label>Categoria</label>
            <input type="text" name="category" class="form-control" value="<?php if($oper == "a") 
            echo $returnCat[0]->descriptive; ?>" required>
		</div>

        <input type="submit" value="Salvar" class="btn btn-outline-primary">



        </form>

        
    </section>

</main>

<?php require_once "footer.php";?>