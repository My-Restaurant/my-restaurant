<?php require_once "header.php";?>

    <main class="my-5">

        <div class="container">

            <h1>Pesquisar Pedido</h1>
            <p>Pesquise o pedido inserindo seu nome</p>
            <hr>

            <label for="search">Insira o nome do pedido</label>
            <input type="text" id="search" class="form-control">
            <button id="btn-search" class="btn btn-outline-danger mt-2">Pesquisar</button>

            <div id="orders" class="d-flex flex-row flex-wrap mt-4">
                <?php 
                
                    require_once "../Models/OrderDAO.php";

                    $orderDAO = new OrderDAO();

                    $data = $orderDAO->listAllOrders();

                    foreach ($data as $key => $value) {
                        echo "<div class='col-12 col-lg-4 col-xl-4 '><a href='itensPedido.php?idOrder=$value->idOrder&status=$value->idStatus' class='btn btn-danger btn-large my-2 mr-2'>
                            <strong>$value->orderName</strong><br>
                            <small>$value->descriptive</small><br>";
                        
                        if($value->idStatus == 1){
                            echo "<span class='badge badge-warning mt-3 p-2'>Aberto</span>";
                        } else {
                            echo "<span class='badge badge-success mt-3 p-2'>Finalizado</span>";
                        }
                            
                        echo "</a></div>";

                    }

                ?>
                <!-- <a href="#" class="btn btn-primary btn-large my-2 mr-2">
                    <strong>Nome do Pedido</strong><br>
                    <small>Número da mesa</small>               
                </a>

                <a href="#" class="btn btn-primary btn-large my-2 mr-2">
                    <strong>Nome do Pedido</strong><br>
                    <small>Número da mesa</small>               
                </a>

                <a href="#" class="btn btn-primary btn-large my-2 mr-2">
                    <strong>Nome do Pedido</strong><br>
                    <small>Número da mesa</small>               
                </a>

                <a href="#" class="btn btn-primary btn-large my-2 mr-2">
                    <strong>Nome do Pedido</strong><br>
                    <small>Número da mesa</small>               
                </a> -->

            </div>

        </div>

    </main>

<script src="js/HttpRequest.js"></script>
<script>

    document.querySelector("#btn-search").addEventListener("click", (e)=>{

        let inputField = document.querySelector("#search")

        if(inputField.value == ""){
            alert("Insira o nome do pedido")
            return false
        }

        let http = new HttpRequest()

        http.xmlHttpGet('buscarPedido.php', ()=>{

            http.complete(()=>{
                let response = http.getResponseText()
                let orders = document.querySelector("#orders")
                orders.innerHTML = "";
                if(response.length > 0){
                    response.forEach(res => {

                        let json = {class: "", txt: ""}

                        if(res.idStatus == 1){
                            json.class = "badge-warning"
                            json.txt = "Aberto"
                        } else {
                            json.class = "badge-success"
                            json.txt = "Finalizado"
                        }

                        orders.innerHTML += `
                        <a href="itensPedido.php?idOrder=${res.idOrder}&status=${res.idStatus}" class="btn btn-primary btn-large my-2 mr-2">
                            <strong>${res.orderName}</strong><br>
                            <small>${res.descriptive}</small>   
                            <br>  
                            <span class='badge ${json.class}'>${json.txt}</span>
                        </a>
                        `
                    });
                    
                } else {
                    orders.innerHTML = "<div class='alert alert-danger'>Nenhuma pedido encontrado</div>";
                }
            })

        }, `?orderName=${inputField.value}`)

    })

</script>
<?php require_once "footer.php";?>
