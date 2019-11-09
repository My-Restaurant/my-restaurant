<?php require_once "header.php"?>

<main class="container py-5">
    <section>
        <h1>Mesas</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mesas</th>
                    <th scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                require_once "../../Models/DeskDAO.php";
                $deskDAO = new DeskDAO();
                $retDesk = $deskDAO->allDesks();

                if(count($retDesk) > 0){
                    foreach($retDesk as $index => $desk){
                        echo "<tr><th scope='col'>".$index."</th>
                        <td>".$desk->descriptive."</td>";
                        echo "<td><a href='mesasCRUD.php?oper=a&id={$desk->idDesk}'>Alterar</a></td>";
                ?>
                        <td><a href = "mesasCRUD.php?oper=e&id=<?php echo $desk->idDesk?>" onclick = 
                        " return confirm('Deseja excluir esta Mesa?')">Excluir</a></td></tr>

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="mesasCRUD.php?oper=i" class="btn btn-outline-primary">Nova Mesa</a>
    </section>

</main>

<?php require_once "footer.php"?>