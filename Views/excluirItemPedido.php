<?php 

    require_once "../Models/OrderDAO.php";

    if(isset($_GET["idOrderItem"]) && $_GET["idOrderItem"] > 0){

        $idOrder = $_GET["idOrder"];

        $order = new Order();
        $order->getOrderItem()[0]->setIdOrderItem($_GET["idOrderItem"]);

        $orderDA0 = new OrderDAO();

        $ret = $orderDA0->deleteOrderItem($order);

        if($ret){
            echo "<script>alert('Pedido excluido com sucesso!'); window.location.href = 'itensPedido.php?idOrder=$idOrder&status=1'</script>";
        } else {
            echo "<script>alert('Erro ao excluir pedido! Tente novamente.'); window.location.href = 'principal.php'</script>";
        }

    } else {
        header("Location: principal.php");
    }

?>