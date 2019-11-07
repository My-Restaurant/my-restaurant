<?php require_once "header.php";?>


<main class="container py-5">
    <section>
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
                        <td>".$category->descriptive."</td>";
                        echo "<td><a href='categoriasCRUD.php?oper=a&id={$category->idCategory}'>Alterar</a></td>";
                ?>
                        <td><a href = "categoriasCRUD.php?oper=e&id=<?php echo $category->idCategory?>"
                        onclick = "return confirm('Deseja excluir esta Mesa?')">Excluir</a></td></tr>

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="categoriasCRUD.php?oper=i" class="btn btn-outline-primary">Nova categoria</a>
    </section>

</main>

<?php require_once "footer.php";?>
