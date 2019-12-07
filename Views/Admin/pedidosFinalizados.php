<?php 
    require_once "header.php";
    require_once "../../Models/OrderDAO.php";

?>

<main>

    <section class="container py-5">
    
        <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2 fa-1x"></i>Voltar</a>

        <h1>Histórico de Pedidos Finalizados</h1>
        <hr>

        <?php
        
        $orderDAO = new OrderDAO();
        $ret = $orderDAO->allFinishedOrders();

        if(count($ret) > 0){

            echo " <table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Garçom</th>
                        <th scope='col'>Mesa</th>
                        <th scope='col'>Preço Total</th>
                        <th scope='col'>Data</th>
                    </tr>
                </thead>
                
                <tbody>";
        
            foreach($ret as $order){
                $dt = new DateTime($order->dt_register);
                echo "<tr>
                    <td>$order->orderName</td>
                    <td>$order->username</td>
                    <td>$order->descriptive</td>
                    <td>" . number_format($order->totalPrice, 2, ',', '.') ."</td>
                    <td>{$dt->format('d/m/Y')}</td>
                </tr>";
            }

            echo "</tbody></table>";
        
    

        }

        else{
            echo "<div class='alert alert-info text-center'>Não há pedidos finalizados</div>";
        }


        ?>
        
    </section>

</main>

<?php require_once "footer.php" ?>