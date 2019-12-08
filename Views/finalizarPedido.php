<?php  

    session_start();

    $id = str_replace(",", "", $_POST["id"]);
    $qtd = str_replace(",", "", $_POST["qtd"]);

    $id = str_split($id, 1);
    $qtd = str_split($qtd, 1);
    
    if(isset($_SESSION["idOrder"])){

        require_once "../Models/OrderDAO.php";
        require_once "../Models/Product.php";

        $order = new Order($_SESSION["idOrder"]);
        $orderDAO = new OrderDAO();
        
        foreach ($id as $key => $value) {
            $prod = new Product($value);
            $order->setOrderItem(null, $qtd[$key], 0.0, $prod); 
        }

        $dataItem = $orderDAO->insertItem($order);

        unset($_SESSION["idOrder"]);
        unset($_SESSION["order"]);

        echo json_encode([
            "response"=> true
        ]);

    } else {
        require_once "../Models/Waiter.php";
        require_once "../Models/OrderDAO.php";
        require_once "../Models/Status.php";
        require_once "../Models/Product.php";
        require_once "../Models/Desk.php";

        $desk = new Desk($_SESSION["numMesa"]);
        $waiter = new Waiter($_SESSION["userData"]->idWaiter);
        $status = new Status();

        $order = new Order(null, 0.0, $waiter, $desk, $status);
        $order->setOrderName($_SESSION["orderName"]);
        $orderDAO = new OrderDAO();
            
        $data = $orderDAO->insert($order);
        
        $order->setIdOrder($data->idOrder);

        foreach ($id as $key => $value) {
            $prod = new Product($value);
            $order->setOrderItem(null, $qtd[$key], 0.0, $prod); 
        }

        $dataItem = $orderDAO->insertItem($order);

        unset($_SESSION["order"]);
        unset($_SESSION["numMesa"]);
        unset($_SESSION["orderName"]);

        echo json_encode([
            "response"=> true
        ]);
    }

?>