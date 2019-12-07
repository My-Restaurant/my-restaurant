<?php 
    require_once "header.php";
    (isset($_GET["idOrder"]) && $_GET["idOrder"] > 0) ? null : header("Location: principal.php");    
?>

    
    <div class="container py-5">
    <a href="itensPedido.php?idOrder=<?=$_GET['idOrder']?>&status=1" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2 fa-1x"></i>Voltar</a>
        <h1>Inserir items no pedido</h1>
        <hr>

        <form method="POST" class="mt-5">
            <?php 

                require_once "../Models/ProductDAO.php";

                $prodDAO = new ProductDAO();

                foreach ($prodDAO->allProducts() as $key => $product) {
                    echo "<div class='form-group row'> 
                            <div class='col-8'>
                                <div class='custom-control custom-checkbox mb-3'>
                                    <input type='checkbox' class='custom-control-input' id='$product->idProduct' name='product[]' value='$product->idProduct'> 
                                    <label class='custom-control-label' for='$product->idProduct'>$product->pDescriptive</label>
                                </div>
                            </div>
                            <div classs='col-4'>
                                <span>R$ $product->price</span>
                            </div>
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
            $order->setOrderItem(null, 1, 0.0, $prod); 
        }

        $dataItem = $orderDAO->insertItem($order);
    ?>
    
        <script>
            let url = "itensPedido.php?idOrder=<?=$_GET['idOrder']?>&status=1"
            window.location.href = url
        </script>;

<?php
    }

?>