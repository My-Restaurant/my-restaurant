<?php require_once "header.php"; ?>

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

        if(isset($_GET["idOrder"]) && $_GET["idOrder"] > 0){

            require_once "../Models/OrderDAO.php";

            $order = new Order($_GET["idOrder"]);
            $orderDAO = new OrderDAO();

            foreach ($orderDAO->listOrderItems($order) as $key => $value) {
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

        }

    ?>
    </tbody>
</table>
<?php require_once "footer.php";?>