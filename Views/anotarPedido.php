<?php require_once "header.php";?>
    
    <main class="py-5">
        <div class="container">
            <h1>Anotar Pedido</h1>
            <hr>

            <form action="inserirPedido.php" method="POST">
                <div class="form-group">
                    <label for="numMesa">Selecione o número da mesa</label>
                    <select class="form-control" name="numMesa" id="numMesa">
                       <option seleted value="0">Selecione o Número da mesa</option>
                       <?php
                       
                       require_once "../Models/DeskDAO.php";

                       $deskDAO = new deskDAO();
                       $retDesk = $deskDAO->allDesks();
                       
                        var_dump($retDesk);

                       foreach ($retDesk as $key => $desk) {
                        echo "<option seleted value='$desk->idDesk'>$desk->descriptive</option>";
                       }
                       
                       ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Continuar">
            </form>
        </div>
    </main>

    <?php require_once "footer.php";?>