<?php 
    require_once "header.php"; 
    (isset($_GET["idOrder"]) && $_GET["idOrder"] > 0) ? null : header("Location: principal.php");

?>

<main>
<section class="container py-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prato</th>
                <th scope="col">Categoria</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço unitario</th>
                <th scope="col">Preço total</th>
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
                        <td>$value->idOrderItem</td>
                        <td>$value->product</td>
                        <td>$value->category</td>
                        <td>$value->quantity</td>
                        <td>R$ " . number_format($value->price, 2, ",", ".") . "</td>
                        <td>R$ " . number_format($value->totalPrice, 2, ",", ".") . "</td>
                    </tr>
                ";
            }
            echo "
               
            "
        ?>
        </tbody>

        <tfoot class='bg-primary text-white'>
            <tr>
                <td colspan='5' class='text-center'><b>Total</b></td>
                <td><b>R$<?= number_format($total,2,",",".");?><b></td>
            </tr>
        </tfoot>
    </table>
    <a href="inserirItem.php?idOrder=<?=$_GET['idOrder']?>" class="btn btn-outline-primary">Adicionar Item</a>
</section>
</main>
 

<?php require_once "footer.php";?>