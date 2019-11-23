<?php 

    require_once "Sql.php";
    require_once "Order.php";

    class OrderDAO {

        public function insert($order){
            $sql = new Sql();
            try {

                $result = $sql->select("CALL sp_orders_store(:total, :desk, :status, :waiter)", [
                    ":total"=> $order->getTotalPrice(),
                    ":desk"=> $order->getDesk()->getIdDesk(),
                    ":status"=> $order->getStatus()->getIdStatus(),
                    ":waiter"=> (int)$order->getWaiter()->getIdWaiter()
                ]);
                $sql->close();
                return $result[0];

            } catch (Exception $e) {
                die($e->getMessage);
                return false;
            }
        }
        
        public function insertItem($order){

            $sql = new Sql();
            try {
                
                $data = [];
                for ($i=0; $i < count($order->getOrderItem()); $i++) { 
                    
                    if($order->getOrderItem()[$i]->getProduct() !== null){

                        $result = $sql->select("CALL sp_ordersItems_store(:qtd, :totalPrice, :obs, :order, :prod)", [
                            ":qtd" => $order->getOrderItem()[$i]->getQuantity(),
                            ":totalPrice" => $order->getOrderItem()[$i]->getTotalPrice(),
                            ":obs" => $order->getOrderItem()[$i]->getObservation(),
                            ":order" => $order->getIdOrder(),
                            ":prod" => $order->getOrderItem()[$i]->getProduct()->getIdProduct()
                        ]); 

                        array_push($data, $result[0]);

                    } 

                }
                
                $sql->close();
                return $data;
            } catch (Exception $e) {
                die($e->getMessage);
                return false;
            }
        }
    }

?>