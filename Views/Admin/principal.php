<?php 
    require_once "header.php";
?>

<main>

    <section class="container py-5">
        <div class="row my-3">
            <div class="col-12">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Pedidos Abertos</div>
                    <div class="card-body row align-items-center py-4">
                        <div class="col-4 text-center">Icone</div>                        
                        <div class="col-8">
                            <p>Quantidade:<span>11</span></p>
                            <a href="mesaFinalizar.php" class="btn btn-light">Finalizar Pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-12">
                    <div class="card bg-light mb-3">
                    <div class="card-header">Garçons Online</div>
                    <div class="card-body row">
                        <div class="col-4 text-center">Icone</div>                        
                        <div class="col-8"> Lorem ipsum</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-12">
                    <div class="card bg-info mb-3">
                    <div class="card-header">Produtos Cadastrados</div>
                    <div class="card-body row">
                        <div class="col-4 text-center">Icone</div>                        
                        <div class="col-8"> 
                        Lorem ipsum
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php require_once "footer.php" ?>