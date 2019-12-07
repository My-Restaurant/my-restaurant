<?php 
    require_once "header.php";
    require_once "../../Models/DeskDAO.php";

    $deskDAO = new deskDAO();
?>


<main class="my-5">

        <div class="container">

        <a href="principal.php" class="btn btn-outline-danger mb-4"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>

            <h1>Finalizar o Pedido</h1>
            <p>Pesquise o pedido selecionando o número da mesa.</p>
            <hr>

            <div class="d-flex flex-row flex-wrap mt-3">
                <?php
                if(count($deskDAO->showDeskWithOpenOrders()) > 0){
                    foreach ($deskDAO->showDeskWithOpenOrders() as $key => $desk) {
                        echo "<a href='finalizarPedido.php?idDesk=$desk->idDesk' class='btn btn-danger btn-large my-2 mr-2'>$desk->descriptive</a>";
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