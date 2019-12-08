<?php 

    require_once "../Models/OrderDAO.php";

    if(isset($_POST["idOrderItem"]) && $_POST["idOrderItem"] > 0){

        $order = new Order($_POST["idOrder"]);
        $order->getOrderItem()[0]->setIdOrderItem($_POST["idOrderItem"]);
        $order->getOrderItem()[0]->setQuantity($_POST["qtd"]);

        $orderDA0 = new OrderDAO();

        $ret = $orderDA0->deleteOrderItem($order);

        echo json_encode(["res"=> $ret]);

    } else {
        echo json_encode(["res"=> false]);
    }

?>