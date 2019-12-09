<?php require_once "header.php";?>


<main class="container py-5">
    <section>
    <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>
        <h1>Categorias</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categorias</th>
                    <th scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once "../../Models/CategoryDAO.php";
                $categoryDAO = new CategoryDAO();
                $returnCat = $categoryDAO->allCategories();

                if(count($returnCat) > 0){
                    foreach($returnCat as $index => $category){
                        echo "<tr><th scope='col'>".$index."</th>
                        <td class='align-middle'>".$category->descriptive."</td>";
                        echo "<td class='align-middle'><a href='categoriasCRUD.php?oper=a&id={$category->idCategory}'><i class='fas fa-sync-alt text-info'></i></a></td>";
                ?>
                        <td class='align-middle'><a href = "categoriasCRUD.php?oper=e&id=<?php echo $category->idCategory?>"
                        onclick = "return confirm('Deseja excluir esta Mesa?')"><i class="fas fa-times fa-1x text-danger"></i></a></td></tr>

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="categoriasCRUD.php?oper=i" class="btn btn-danger btn-b"><i class="fas fa-plus mr-2"></i>Nova categoria</a>
    </section>

</main>

<?php require_once "footer.php";?>
