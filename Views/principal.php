<?php 
    require_once "header.php";
?>

    <main class="container my-5">
        <div class="row my-5">
            <div class="col-12">
                <h1 class="text-right" id="hour"></h1>
                <h2 class="text-right" id="date"></h2>
            </div>
        </div>

        <a href="anotarPedido.php" class="btn btn-b btn-danger p-4 mb-2"><i class="fas fa-plus mr-2"></i>Anotar pedido</a>
        <a href="consultarPedido.html" class="btn btn-b btn-danger p-4 mb-2"><i class="fas fa-search mr-2"></i>Consultar um pedido</a>


        <h2 class="mt-5">Pedidos Recentes</h2>
        <hr>

        <div class="accordion" id="accordionOrders">
            <?php 

                require_once "../Models/OrderDAO.php";
                require_once "../Models/DeskDAO.php";

                $deskDAO = new DeskDAO();
                $orderDAO = new OrderDAO();

                foreach ($deskDAO->allDesks() as $key => $value) {
                    $desk = new Desk($value->idDesk); 
                    $orders = $orderDAO->ordersByDesk($desk);
            ?>

        
            <div class="card">
                <div class="card-header bg-dark" id="<?= $value->descriptive?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white collapsed" type="button" data-toggle="collapse"
                            data-target="#d<?= $value->idDesk?>" aria-expanded="false" aria-controls="collapseTwo">
                            <?=$value->descriptive?>
                        </button>
                    </h2>
                </div>
                <div id="d<?= $value->idDesk?>" class="collapse show" aria-labelledby="<?= $value->descriptive?>" data-parent="#accordionOrders">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Status</th>
                                    <th scope="col">Horário</th>
                                    <th scope="col">Ações</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(count($orders) > 0){
                                        //lista os pedidos da mesa
                                        foreach ($orders as $key => $value) {
                                            $dateTime = new DateTime($value->dt_register);
                                            echo "
                                                <tr>
                                                    <td>$value->descriptive</td>
                                                    <td>" . $dateTime->format('H:i') /*formatando a hora*/  . "</td> 
                                                    <td>
                                                        <a href='itensPedido.php?idOrder=$value->idOrder&status=$value->idStatus' class='btn btn-outline-primary'>Ver Itens</a>
                                                    ";

                                                    if($value->idStatus != 2){
                                                        ?>
                                                            <a href="excluirPedido.php?idOrder=<?php echo $value->idOrder;?>" class="btn btn-outline-danger"  onclick = "return confirm('Deseja excluir esse pedido?')"><i class='fas fa-times text-danger' style='font-size: 16pt;'></i></a>
                                                        <?php 
                                                    } else {
                                                        echo "</td>";
                                                    }

                                                echo "</tr>";
   
                                        }
                                    } else {
                                        //Não há registro de pedidos
                                        echo "
                                        <tr>
                                            <td colspan='3'>Nenhum pedido encontrado</td>
                                        </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
            }
            
        ?>
        </div>

    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/principal.js"></script>

    <script>

        document.querySelector("body").addEventListener("load", ()=>{
            startTime()
        })

        //hours
        function startTime() {
            var date = new Date();
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();

            //adicionar 0 na frente dos num. < 10
            m = checkTime(m);
            s = checkTime(s);

            document.getElementById("hour").innerHTML = `${h}:${m}:${s}`;

            var t = setTimeout(function () { startTime() }, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    </script>
</body>

</html>