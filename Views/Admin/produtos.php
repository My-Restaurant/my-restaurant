<?php require_once "header.php"?>

<main class="container py-5">
    <section>

    <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>
        <h1>Produtos</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produtos</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>    
                    <th scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once "../../Models/ProductDAO.php";
                $prodDAO = new ProductDAO();
                $retProd = $prodDAO->allProducts();
                

                if(count($retProd) > 0){
                    foreach( $retProd as $index => $product){
                        echo "<tr><th scope='col' class='align-middle'>".$index."</th>
                        <td class='align-middle'>".$product->pDescriptive."</td>
                        <td class='align-middle'>".$product->price."</td>
                        <td class='align-middle'>".$product->cDescriptive."</td>";
                        echo "<td class='align-middle'><a href='produtosCRUD.php?oper=a&id={$product->idProduct}'><i class='fas fa-sync-alt text-info'></i></a></td>";
                ?>
                        <td class='align-middle'><a href = "produtosCRUD.php?oper=e&id=<?php echo $product->idProduct;?>" onclick = 
                        " return confirm('Deseja excluir esta Produto?')"><i class="fas fa-times fa-1x text-danger"></i></a></td></tr>

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="produtosCRUD.php?oper=i" class="btn btn-danger btn-b"><i class="fas fa-plus mr-2"></i>Novo Produto</a>
    </section>

</main>

<?php require_once "footer.php"?>