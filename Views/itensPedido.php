<?php 
    require_once "header.php"; 
    (isset($_GET["idOrder"]) && $_GET["idOrder"] > 0) ? null : header("Location: principal.php");

    $idOrder = $_GET["idOrder"];

?>

<main>
<section class="container py-5">
    <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Prato</th>
                <th scope="col" class="text-center">Quantidade</th>
                <th scope="col">Preço unitario</th>
                <th scope="col">Preço total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php 

            require_once "../Models/OrderDAO.php";
        
            $order = new Order($_GET["idOrder"]);
            $orderDAO = new OrderDAO();
            $total = 0;
            foreach ($orderDAO->listOrderItems($order) as $key => $value) {
                $total += (float)$value->totalPrice;
                echo "
                    <tr>
                        <td>$value->product</td>
                        <td class='text-center'>$value->quantity</td>
                        <td>R$ " . number_format($value->price, 2, ",", ".") . "</td>
                        <td>R$ " . number_format($value->totalPrice, 2, ",", ".") . "</td>
                ";
                
                if($_GET["status"] == 1){
                    echo "<td class='text-center'>";?> 
                            <a href="excluirItemPedido.php?idOrderItem=<?php echo $value->idOrderItem;?>&idOrder=<?php echo $idOrder;?>" onclick = "return confirm('Deseja excluir esse item?')"><i class='fas fa-times text-danger'></i></a>
                    <?php echo "</td>";
                } else {
                    echo "<td></td>";
                }

                echo "</tr>";
            }

        ?>
        </tbody>

        <tfoot class='bg-primary text-white'>
            <tr>
                <td colspan='4' class='text-center'><b>Total</b></td>
                <td><b>R$<?= number_format($total,2,",",".");?><b></td>
            </tr>
        </tfoot>
    </table>
    <?php 
        if($_GET["status"] != 2){
    ?>
    <a href="inserirItem.php?idOrder=<?=$_GET['idOrder']?>" class='btn btn-b btn-outline-danger'>Adicionar Item</a>
    <?php
        } else {
            echo "<div class='alert alert-success text-center'><b>Pedido finalizado<b></div>";
        }
    ?>
</section>
</main>
 

<?php require_once "footer.php";?>