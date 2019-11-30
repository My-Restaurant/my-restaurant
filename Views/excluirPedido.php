<?php 

    require_once "../Models/OrderDAO.php";

    if(isset($_GET["idOrder"]) && $_GET["idOrder"] > 0){

        $order = new Order($_GET["idOrder"]);

        $orderDAO = new OrderDAO();
        $ret = $orderDAO->deleteOrder($order);

        if($ret){
            echo "<script>alert('Pedido excluido com sucesso!'); window.location.href = 'principal.php'</script>";
        } else {
            echo "<script>alert('Erro ao excluir pedido! Tente novamente.'); window.location.href = 'principal.php'</script>";
        }

    } else {
        header("Location: principal.php");
    }

?>