<?php require_once "header.php";
        require_once "../../Models/ProductDAO.php";

$oper = "";
$id = 0;

if($_GET){
    $oper = $_GET["oper"];
    if($oper == "a"){
        $id = $_GET["id"];
        $prod = new Product($id);
        $prodDAO = new ProductDAO();
        $retProd = $prodDAO->oneProduct($prod);
        
    }

    if($oper == "e"){
        $id = $_GET["id"];
        $prod = new Product($id);
        $prodDAO = new ProductDAO();
        $prodDAO->deleteProduct($prod);
        echo "<script>alert('Produto excluído com sucesso!');
        window.location.href='produtos.php'</script>";
    }
}

if($_POST){

    switch($oper){
       
        case "i":
        $prod = new Product(null, $_POST["product"], $_POST["price"], $_POST["category"]);
        $prodDAO = new ProductDAO();
        $prodDAO->insertProduct($prod);

        echo "<script>alert('Produto cadastrado com sucesso!');
        window.location.href='produtos.php'</script>";
        break;

        case "a": 
        $prod = new Product($id, $_POST["product"], $_POST["price"], $_POST["category"]);
        $prodDAO = new ProductDAO();
        $prodDAO->updateProduct($prod);
        echo "<script>alert('Produto alterado com sucesso!');
        window.location.href='produtos.php'</script>";
        break;
    }

}



?>

<main class="container py-5">
    <section>
        <h1>Produtos</h1>
        <hr>

        <form method="POST" action="#">


		<div class="form-group">
			<label>Produto</label>
            <input type="text" name="product" class="form-control" value="<?php if($oper == "a") echo $retProd[0]->pDescriptive; ?>" required>
		</div>

        <div class="form-group">
			<label>Preço</label>
            <input type="text" name="price" class="form-control" value="<?php if($oper == "a") echo $retProd[0]->price; ?>" required>
		</div>

        <div class="form-group">
			<label for="categoy">Categoria</label>
            <select name="category" id="category" class="form-control">
                <option value="0">Escolha uma categoria</option>
                <?php

                require_once "../../Models/CategoryDAO.php";
                $catDAO= new CategoryDAO();
                $retCat = $catDAO->allCategories();

                if(count($retCat) > 0){
                    
                    foreach($retCat as $category){
                        if($oper == "a" && $category->idCategory == $retProd[0]->idCategory)
                        echo "<option selected value='$category->idCategory'>$category->descriptive</option>";
                        else
                        echo "<option value='$category->idCategory'>$category->descriptive</option>";
                    }
                }
                
                ?>
            </select>
		</div>

        <input type="submit" value="Salvar" class="btn btn-outline-primary">

        </form>

        
    </section>

</main>

<?php require_once "footer.php";?>