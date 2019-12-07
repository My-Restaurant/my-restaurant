<?php require_once "header.php";?>


<main class="container py-5">
    <section>
    <a href="principal.php" class="btn btn-outline-danger mb-3"><i class="fas fa-arrow-left mr-2" style="font-size: 10pt;"></i>Voltar</a>
        <h1>Status</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php      
                
                require_once "../../Models/StatusDAO.php";
                $statusDAO = new StatusDAO();
                $retStatus = $statusDAO->allStatus();

                if(count($retStatus) > 0){
                    foreach( $retStatus as $index => $status ){
                        echo "<tr><th scope='col'>".$index."</th>
                        <td>".$status->descriptive."</td>";
                        echo "<td><a href='statusCRUD.php?oper=a&id={$status->idStatus}'>Alterar</a></td>";
                ?>
                        <!-- <td><a href = "statusCRUD.php?oper=e&id= <?php //echo $status->idStatus;?>" onclick = 
                        "return confirm('Deseja excluir esta Mesa?')">Excluir</a></td></tr> -->

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="statusCRUD.php?oper=i" class="btn btn-outline-primary">Novo Status</a>
    </section>

</main>

<?php require_once "footer.php"; ?>