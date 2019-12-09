<?php 
    require_once "header.php"; 
    (isset($_GET["idOrder"]) && $_GET["idOrder"] > 0) ? null : header("Location: principal.php");

    $idOrder = $_GET["idOrder"];

?>

<main>
<section class="container py-5">
    <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Prato</th>
                <th scope="col" class="text-center">Quant.</th>
                <th scope="col" class="text-center">Preço unitario</th>
                <th scope="col" class="text-center">Preço total</th>
                <th scope="col"></th>
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
                        <td class='align-middle'>$value->product</td>
                        <td class='align-middle text-center'>$value->quantity</td>
                        <td class='align-middle text-center'>R$ " . number_format($value->price, 2, ",", ".") . "</td>
                        <td class='align-middle text-center'>R$ " . number_format($value->totalPrice, 2, ",", ".") . "</td>
                ";
                
                if($_GET["status"] == 1){
                    echo "<td class='align-middle text-center'>";?> 
                            <a data-desc="<?=$value->product?>" data-order="<?=$_GET["idOrder"]?>"
                            class="delete-order" data-toggle="modal" data-target="#modal-itens" 
                            data-key="<?=$value->idOrderItem?>" data-qtd="<?=$value->quantity?>"
                            href="#"><i class='fas fa-times text-danger'></i></a>
                    <?php echo "</td>";
                } else {
                    echo "<td></td>";
                }

                echo "</tr>";
            }

        ?>
        </tbody>

        <tfoot class='bg-dark text-white'>
            <tr>
                <td colspan='3' class='text-center bg-dark'><b>Total</b></td>
                <td colspan='2' class='bg-dark'><b>R$<?= number_format($total,2,",",".");?><b></td>
            </tr>
        </tfoot>
    </table>
    <?php 
        if($_GET["status"] != 2){
    ?>
    <a href="inserirItem.php?idOrder=<?=$_GET['idOrder']?>" class='btn btn-b btn-danger'>Adicionar Item</a>
    <?php
        } else {
            echo "<div class='alert alert-success text-center'><b>Pedido finalizado<b></div>";
        }
    ?>
</section>
<!-- Modal -->
<div class="modal fade" id="modal-itens" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados do pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</main>

<script src="js/HttpRequest.js"></script>
<script>

    let button = document.querySelectorAll(".delete-order")

    button.forEach(btn => {
        
        btn.addEventListener("click", (e)=>{
            document.querySelector(".modal-body").innerHTML = `
                <form class="px-3" id="form-delete-item">
                    <div class="row">
                        <label for="qtd">${btn.dataset.desc}</label>
                        <input type="number" min="1" max="${btn.dataset.qtd}" class="form-control" name="qtd" id="qtd" value="${btn.dataset.qtd}">
                        <input type="hidden" name="idOrderItem" value="${btn.dataset.key}">  
                        <input type="hidden" name="idOrder" value="${btn.dataset.order}">    
                    </div>
                    <input type="submit" class="btn btn-block btn-primary mt-2" value="Remover">
                </form>
            `

            let form = document.querySelector("#form-delete-item")

            form.addEventListener("submit", (e)=>{
                e.preventDefault()
                
                let formData = new FormData(form)

                let http = new HttpRequest();

                http.xmlHttpPost("excluirItemPedido.php", ()=>{
                    
                    http.complete(()=>{
                        if(http.getResponseText()){
                            alert("Item excluido com sucesso!")
                            window.location.reload()
                        } else {
                            alert("Erro ao excluir item, por favor tente novamente.")
                        }
                    })

                }, formData)

            })

        })

    });

</script>

<?php require_once "footer.php";?>