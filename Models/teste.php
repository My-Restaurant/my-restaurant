<?php

require_once "User.php";
require_once "Admin.php";
require_once "Waiter.php";
require_once "Categorie.php";
require_once "Desk.php";
require_once "Product.php";
require_once "Status.php";
require_once "Order.php";
require_once "OrderItem.php";

$w = new Waiter(null,1.00,null,"Pedro","45678912312", "w", "mail@gmail.com", "senha123");

$o = new Order(null, 4.00, $w);

$c = new Categorie(null, "cat");
$p = new Product(null, "Hamburguer", 2.00, $c);
$p2 = new Product(null, "Pizza", 2.00, $c);

$s = new Status(null, "pronto");

$oi = new OrderItem(null, 10, 190.00, "sem alface", $s, $p);
$oi->setProduct($p2);


var_dump($o);




?>