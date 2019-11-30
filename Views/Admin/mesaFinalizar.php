<?php 
    require_once "header.php";
    require_once "../../Models/DeskDAO.php";

    $deskDAO = new deskDAO();
?>


<main class="my-5">

        <div class="container">

            <h1>Finalizar o Pedido</h1>
            <hr>
            <p>Pesquise o pedido selecionando o número da mesa.</p>

            <div class="d-flex flex-row flex-wrap mt-5">
                <?php
                if(count($deskDAO->showDeskWithOpenOrders()) > 0){
                    foreach ($deskDAO->showDeskWithOpenOrders() as $key => $desk) {
                        echo "<a href='finalizarPedido.php?idDesk=$desk->idDesk' class='btn btn-primary btn-large my-2 mr-2'>$desk->descriptive</a>";
                    }
                }
                
                else{
                    echo "<div class='alert alert-info w-100 text-center'><b>Não há pedidos em aberto no momento</b></div>";
                }
                        
                ?>

            </div>

        </div>

    </main>

<?php require_once "footer.php";?>