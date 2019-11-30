<?php 
    require_once "header.php"; 
    (isset($_GET["idOrder"]) && $_GET["idOrder"] > 0) ? null : header("Location: principal.php");

    $idOrder = $_GET["idOrder"];

?>

<main>
<section class="container py-5">
    <a href="principal.php" class="btn btn-outline-primary mb-3">Voltar</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Prato</th>
                <th scope="col">Categoria</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço unitario</th>
                <th scope="col">Preço total</th>
                <th scope="col">Ações</th>
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
                        <td>$value->category</td>
                        <td>$value->quantity</td>
                        <td>R$ " . number_format($value->price, 2, ",", ".") . "</td>
                        <td>R$ " . number_format($value->totalPrice, 2, ",", ".") . "</td>
                ";
                
                if($_GET["status"] == 1){
                    echo "<td>
                            <a href='excluirItemPedido.php?idOrderItem=$value->idOrderItem&idOrder=$idOrder'>excluir</a>
                        </td>";
                } else {
                    echo "<td></td>";
                }

                echo "</tr>";
            }

        ?>
        </tbody>

        <tfoot class='bg-primary text-white'>
            <tr>
                <td colspan='5' class='text-center'><b>Total</b></td>
                <td><b>R$<?= number_format($total,2,",",".");?><b></td>
            </tr>
        </tfoot>
    </table>
    <?php 
        if($_GET["status"] != 2){
    ?>
    <a href="inserirItem.php?idOrder=<?=$_GET['idOrder']?>" class='btn btn-outline-primary'>Adicionar Item</a>
    <?php
        } else {
            echo "<div class='alert alert-success text-center'><b>Pedido finalizado<b></div>";
        }
    ?>
</section>
</main>
 

<?php require_once "footer.php";?>