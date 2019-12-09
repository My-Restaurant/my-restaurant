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
                        echo "<tr><th scope='col' class='align-middle'>".$index."</th>
                        <td class='align-middle'>".$status->descriptive."</td>";
                        echo "<td class='align-middle'><a href='statusCRUD.php?oper=a&id={$status->idStatus}'><i class='fas fa-sync-alt text-info'></i></a></a></td>";
                ?>
                        <!-- <td><a href = "statusCRUD.php?oper=e&id= <?php //echo $status->idStatus;?>" onclick = 
                        "return confirm('Deseja excluir esta Mesa?')">Excluir</a></td></tr> -->

                <?php

                    }
                }

                ?>
            </tbody>

        </table>

        <a href="statusCRUD.php?oper=i" class="btn btn-danger btn-b"><i class="fas fa-plus mr-2"></i>Novo Status</a>
    </section>

</main>

<?php require_once "footer.php"; ?>