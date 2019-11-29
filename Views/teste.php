<?php 

    // require_once "../Models/DeskDAO.php";
    // require_once "../Models/Waiter.php";
    // require_once "../Models/Status.php";
    // require_once "../Models/OrderDAO.php";
    // require_once "../Models/Product.php";

    // $desk = new Desk(1);
    // $waiter = new Waiter(1);
    // $status = new Status(1);
    // $order = new Order(null, 0.0, $waiter, $desk, $status);
    // $product = new Product(1);
    // $orderDAO = new OrderDAO();

    // $data = $orderDAO->insert($order);
    // $order->setIdOrder($data->idOrder);
    // $order->setOrderItem(null, 2, 0.0, "", $product);

    // var_dump($orderDAO->insertItem($order));

    echo password_hash("321", PASSWORD_DEFAULT, [
        "cost"=> 12
    ]);

    

?>