<?php 
    require_once "header.php";
    require_once "../../Models/OrderDAO.php";
    require_once "../../Models/ProductDAO.php";
    require_once "../../Models/WaiterDAO.php";
?>

<main>

    <section class="container py-5">
        <div class="row mt-3">
            <div class="col-12 col-lg-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Pedidos Abertos</div>
                    <div class="card-body row align-items-center py-4">
                        <div class="col-5 text-center"><i class="fas fa-cart-arrow-down fa-4x"></i></i></div>                        
                        <div class="col-7">
                            <p>Quantidade: <span><?=OrderDAO::countOpenOrders()->total?></span></p>
                            <a href="mesaFinalizar.php" class="btn btn-light">Finalizar Pedido</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                    <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Garçons Cadastrados</div>
                    <div class="card-body row align-items-center py-4">
                        <div class="col-5 text-center"><i class="fas fa-users fa-4x"></i></div>                        
                        <div class="col-7">
                            <p>Garçons: <span><?=WaiterDAO::countWaiters()->total?></span></p>
                            <a href="cadastrarGarcom.php" class="btn btn-light">Cadastrar Garçons</a>
                        </div>
                    </div>
                </div>
            </div>
        

            <div class="col-12 col-lg-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Produtos Cadastrados</div>
                    <div class="card-body row align-items-center py-4">
                        <div class="col-5 text-center"><i class="fas fa-shopping-bag fa-4x"></i></div>                        
                        <div class="col-7">
                            <p>Quantidade: <span><?=ProductDAO::countProducts()->total?></span></p>
                            <a href="produtos.php" class="btn btn-light">Cadastrar Produtos</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12 col-lg-4">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">Histórico</div>
                    <div class="card-body row align-items-center py-4">
                        <div class="col-5 text-center"><i class="fas fa-clipboard-list fa-4x"></i></div>                        
                        <div class="col-7">
                            <p>Pedidos Finalizados: <span><?=OrderDAO::countFinishedOrders()->total?></span></p>
                            <a href="pedidosFinalizados.php" class="btn btn-light">Ver pedidos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php require_once "footer.php" ?>