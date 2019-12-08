<?php 

    if(isset($_GET["orderName"])){
        
        require_once "../Models/OrderDAO.php";

        $order = new Order();
        $order->setOrderName($_GET["orderName"]);

        $orderDAO = new OrderDAO();
        $data = $orderDAO->searchOrdersByName($order);

        echo json_encode($data);

    }

?>