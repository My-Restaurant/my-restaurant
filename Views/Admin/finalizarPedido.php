<?php 
    require_once "header.php";
    require_once "../../Models/DeskDAO.php";
    require_once "../../Models/OrderDAO.php";

    (!isset($_GET["idDesk"]) || $_GET["idDesk"] <= 0) ? header("Location: mesaFinalizar.php") : null;
    
    $desk = new Desk($_GET["idDesk"]);

    $orderDAO = new OrderDAO();
    $data = $orderDAO->ordersByDesk($desk);

    $order = new Order($data[0]->idOrder);

    $items = $orderDAO->listOrderItems($order);

?>


<main class="my-5">

        <div class="container">
        <a href="mesaFinalizar.php" class="btn btn-outline-danger mb-4"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>

            <h1 class="mb-2">Finalizar o Pedido</h1>
            <p>Para finalizar o pedido, verifique os itens do pedido e então clique em finalizar.</p>
            
            

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Prato</th>
                        <th scope="col" class="text-center">Quant.</th>
                        <th scope="col" class="text-center">Preço unitario</th>
                        <th scope="col" class="text-center">Preço total</th>
                    </tr>
                </thead>
                <tbody>

            <?php
            
            $total = 0;
            foreach ($items as $key => $item) {
                $total += (float)$item->totalPrice;
                echo "
                    <tr>
                        <td class='align-middle'>$key</td>
                        <td class='align-middle'>$item->product</td>
                        <td class='align-middle text-center'>$item->quantity</td>
                        <td class='align-middle text-center'>R$ " . number_format($item->price, 2, ",", ".") . "</td>
                        <td class='align-middle text-center'>R$ " . number_format($item->totalPrice, 2, ",", ".") . "</td>
                    </tr>
                ";
            }

            ?>
        </tbody>

        <tfoot class='bg-dark text-white'>
            <tr>
                <td colspan='4' class='text-center'><b>Total</b></td>
                <td colspan='1'><b>R$<?= number_format($total,2,",",".");?><b></td>
            </tr>
        </tfoot>
        </table>
            <form action="#" method="POST" onsubmit="return confirm('Deseja finalizar o pedido?')">
                <div class="form-group  justify-content-end d-flex">
                    <button type="submit" class="btn btn-success btn-block py-3" >Finalizar<i class="fas fa-check ml-2"></i></button>
                </div>
            </form>    
        </div>

    </main>

<?php require_once "footer.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $ret = $orderDAO->finishOrder($order);

    if($ret){
        echo "<script>alert('Pedido finalizado com Sucesso!'); window.location.href = 'principal.php'</script>";
    }
    else{
        echo "<script>alert('Falha ao finalizar pedido! Tente novamente.');</script>";
    }

    

}




?>