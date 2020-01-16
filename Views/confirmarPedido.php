<?php 

    require_once "header.php";
    require_once "../Models/ProductDAO.php";
?>
<main>
    <div class="container py-5">
        <h1>Confirmar Pedido</h1>
        <hr>
        <div class="card">
            <div class="card-header">
                Pedido
            </div>
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-6">
                        <?php 
                            foreach ($_SESSION["order"] as $key => $value) {
                                $prod = new Product($value["id"]);
                                $prodDAO = new ProductDAO();
                                $ret = $prodDAO->oneProduct2($prod);
                        ?>
                            <p class="prod-desc" id="prod<?=$value["id"]?>"><?=$ret->pDescriptive?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-6">
                        <?php 
                            foreach ($_SESSION["order"] as $key => $value) {
                        ?>
                            <p>
                                <input type='number' class='form-control' name='qtd' value='<?=$value["qtd"]?>' data-key='prod<?=$value["id"]?>' >
                            </p>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <button id="send" class="btn btn-danger mt-3 btn-b">Enviar</button>
    </div>
</main>

<script src="js/HttpRequest.js"></script>
<script>

    window.onload = () => {

        let prod = []
        
        document.querySelector("#send").addEventListener("click", (e)=>{

            let qtd = document.querySelectorAll("input[type=number]")

            qtd.forEach(element => {

                let id = element.dataset.key.replace("prod", "")
                prod.push({id, qtd: element.value})

            });

            let http = new HttpRequest();

            let formData = new FormData();

            let id = []
            let qtde = []

            prod.forEach(p => {
                id.push(p.id)
                qtde.push(p.qtd)
            });

            formData.append("id", id);
            formData.append("qtd", qtde);

            http.xmlHttpPost("finalizarPedido.php", ()=>{

                http.complete(()=>{
                    window.location.href = "principal.php";
                })

            }, formData)

        })  

    }

</script>
<?php 
    require_once "footer.php";
?>