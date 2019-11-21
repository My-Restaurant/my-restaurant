<?php require_once "header.php";?>


<main class="container py-5">
    
    <section>
        
        <h1>Anotar Pedido</h1>
        <hr>
        
        <form action="POST">
            <div class="form-group">
                <label for="desk">Selecione uma Mesa</label>
                <select class="form-control" id="desk">
                    <option selected value="0">Selecione uma mesa</option>
                    <?php
                    require_once "../../Models/DeskDAO.php";
                    $deskDAO = new DeskDAO();
                    $retDesk = $deskDAO->allDesks();
                    
                    if(count($retDesk) > 0){
                        foreach($retDesk as $index => $desk){
                            echo "<option value='$desk->idDesk'>$desk->descriptive</option>";
                        }
                    }                
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Enviar</button>

        
        </form>
    </section>

</main>



<?php require_once "footer.php";?>