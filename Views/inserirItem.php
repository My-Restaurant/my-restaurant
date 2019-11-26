<?php 
    require_once "header.php";
    (isset($_GET["idOrder"]) && $_GET["idOrder"] > 0) ? null : header("Location: principal.php");    
?>

<h1 class="text-center">Inserir items no pedido</h1>
<div class="container">
    <form method="POST">
        <?php 

            require_once "../Models/ProductDAO.php";

            $prodDAO = new ProductDAO();

            foreach ($prodDAO->allProducts() as $key => $product) {
                echo "<div class='form-group form-check'>
                        <input type='checkbox' id='$product->idProduct' name='product[]' value='$product->idProduct' class='form-check-input'> 
                        <label for='$product->idProduct'>$product->pDescriptive</label>
                        <span class='ml-5'>$product->price</span>
                    </div>";
            };

        ?>
        <input type="submit" class="btn btn-primary" value="Adicionar">
    </form>
</div>

<?php require_once "footer.php" ?>

<?php 

    if(isset($_POST["product"])){

        require_once "../Models/OrderDAO.php";

        $order = new Order($_GET["idOrder"]);
        $orderDAO = new OrderDAO();
        
        foreach ($_POST["product"] as $key => $value) {
            $prod = new Product($value);
            $order->setOrderItem(null, 1, 0.0, "", $prod); 
        }

        $dataItem = $orderDAO->insertItem($order);

        header("Location: itensPedido.php?idOrder={$_GET['idOrder']}");

    }

?>