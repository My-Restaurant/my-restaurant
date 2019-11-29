<?php require_once "header.php";?>
<?php 

    !isset($_POST["numMesa"]) ? header("Location: anotarPedido.php") : null; 

?>
<main class="py-5">
        <div class="container">
            
        <h1>Inserir Itens no Pedido</h1>
        <hr>

            <form action="#" method="POST">
                
                    <h2>Selecione os produtos no pedido</h2>
                    <?php 
                    
                    require_once "../Models/ProductDAO.php";
                    $prodDAO = new ProductDAO();
                    $ret = $prodDAO->allProducts();

                    foreach ($ret as $product) {
                        echo "<div class='form-group form-check'>
                            <input type='checkbox' id='$product->idProduct' name='product[]' value='$product->idProduct' class='form-check-input'> 
                            <label for='$product->idProduct'>$product->pDescriptive</label>
                            <span class='ml-5'>$product->price</span>
                        </div>";
                    }
                    
                    ?>
                    <input type="hidden" name="numMesa" value="<?=$_POST['numMesa'];?>">
                
                <input type="submit" class="btn btn-primary" value="Continuar">
            </form>
        </div>
    </main>

<?php require_once "footer.php";?>

<?php 
    
    if(isset($_POST["product"])){

        require_once "../Models/Waiter.php";
        require_once "../Models/Desk.php";
        require_once "../Models/OrderDAO.php";
        require_once "../Models/Status.php";
        require_once "../Models/Product.php";
    
        $waiter = new Waiter($_SESSION["userData"]->idWaiter);
        $desk = new Desk($_POST["numMesa"]);
        $status = new Status();
    
        $order = new Order(null, 0.0, $waiter, $desk, $status);
        $orderDAO = new OrderDAO();
         
        $data = $orderDAO->insert($order);
        
        $order->setIdOrder($data->idOrder);

        foreach ($_POST["product"] as $key => $value) {
            $prod = new Product($value);
            $order->setOrderItem(null, 1, 0.0, $prod); 
        }

        $dataItem = $orderDAO->insertItem($order);

        header("Location: principal.php");

    }
    
    
?>