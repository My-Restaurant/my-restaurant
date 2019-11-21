<?php require_once "header.php"?>

<main class="container py-5">
    <section>
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
                        echo "<tr><th scope='col'>".$index."</th>
                        <td>".$product->pDescriptive."</td>
                        <td>".$product->price."</td>
                        <td>".$product->cDescriptive."</td>";
                        echo "<td><a href='produtosCRUD.php?oper=a&id={$product->idProduct}'>Alterar</a></td>";
                ?>
                        <td><a href = "produtosCRUD.php?oper=e&id=<?php echo $product->idProduct;?>" onclick = 
                        " return confirm('Deseja excluir esta Produto?')">Excluir</a></td></tr>

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="produtosCRUD.php?oper=i" class="btn btn-outline-primary">Novo Produto</a>
    </section>

</main>

<?php require_once "footer.php"?>