<?php 

    require_once "Sql.php";

    class OrderDAO {

        public function insert($order){
            $sql = new Sql();
            try {

                $sql->query("INSERT INTO tb_orders(totalPrice, idDesk, idStatus, idWaiter)
                VALUES(:total, :desk, :status, :waiter)", [
                    ":total"=> $order->getTotalPrice(),
                    ":desk"=> $order->getDesk(),
                    ":status"=> $order->getStatus(),
                    ":waiter"=> $order->getWaiter()
                ]);
                $sql->close();
                return true;

            } catch (Exception $e) {
                die($e->getMessage);
                return false;
            }
        }
        
        public function insertItem($order){

            $sql = new Sql();
            try {
                $sql->query("INSERT INTO tb_orderItems(quantity, totalPrice, observation, idOrder, idProduct)
                VALUES(:qtd, :totalPrice, :obs, :order, :prod)", [
                    ":qtd" => $order->getOrderItem()->getQuantity(),
                    ":totalPrice" => $order->getOrderItem()->getTotalPrice(),
                    ":obs" => $order->getOrderItem()->getObservation(),
                    ":order" => $order->getIdOrder(),
                    ":prod" => $order->getOrderItem()->getProduct()->getIdProduct()
                ]);
                $sql->close();
                return true;
            } catch (Exception $e) {
                die($e->getMessage);
                return false;
            }
        }
    }

?>