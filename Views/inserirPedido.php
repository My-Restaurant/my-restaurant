<?php require_once "header.php";?>
<?php 

    if(!isset($_POST["numMesa"]) || $_POST["numMesa"] == 0){
        echo "<script>alert('Selecione o número da mesa!'); window.location.href = 'anotarPedido.php';</script>";
    }  

    require_once "../Models/Desk.php";
    require_once "../Models/OrderDAO.php";

    $desk = new Desk($_POST["numMesa"]);

    if(OrderDAO::verifyOrders($desk) !== false){
        header("Location: itensPedido.php?idOrder=" . OrderDAO::verifyOrders($desk)->idOrder . "&status=1"); 
    }

?>
<main class="py-5">


        <div class="container">
        <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>            
        <h4 class="mt-4">Produtos</h4><hr>
            <form action="#" method="POST">
                    <div class="form-group">
                        <label for="search"><strong>Pesquisar por Categoria</strong></label>
                        <select name="search" id="search" class="form-control">
                            <option value="">FALTA FAZER</option>
                        </select>
                    </div>

                        <?php 
                        
                        require_once "../Models/ProductDAO.php";
                        $prodDAO = new ProductDAO();
                        $ret = $prodDAO->allProducts();

                        foreach ($ret as $product) {

                            echo "<div class='custom-control custom-checkbox mb-3'>
                            <input type='checkbox' class='custom-control-input' id='$product->idProduct' name='product[]' value='$product->idProduct'>
                            <label class='custom-control-label' for='$product->idProduct'>$product->pDescriptive</label>
                          </div>";
                        }
                        
                        ?>

                    
                    
                    <input type="hidden" name="numMesa" value="<?=$_POST['numMesa'];?>">
                
                <input type="submit" class="btn btn-danger btn-b" value="Continuar">
            </form>
        </div>
    </main>


<?php require_once "footer.php";?>

<?php 
    
    if(isset($_POST["product"])){

        require_once "../Models/Waiter.php";
        require_once "../Models/Status.php";
        require_once "../Models/Product.php";
    
        $waiter = new Waiter($_SESSION["userData"]->idWaiter);
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

        echo "<script>
            window.location.href = 'principal.php' 
        </script>";

    }
    
    
?>