<?php

require_once "Sql.php";
require_once "Product.php";

class ProductDAO{

    public function allProducts(){
        $sql = new Sql();
        $result = $sql->select("SELECT idProduct, p.descriptive 'pDescriptive', price, idCategory, 
        c.descriptive 'cDescriptive'  FROM tb_products p INNER JOIN tb_categories c using(idCategory)");
        $sql->close();
        return $result;

    }

    public function insertProduct($prod){
        $sql = new Sql();
        $sql->query("INSERT INTO tb_products(descriptive, price, idCategory) VALUES (:desc, :price, :idCat)", 
        [":desc" => $prod->getDescriptive(),
         ":price" => $prod->getPrice(),
         ":idCat" => $prod->getCategory()]);
         $sql->close();
         return true;
    }

    public function oneProduct($prod){
        $sql = new Sql();
        $result = $sql->select("SELECT idProduct, p.descriptive 'pDescriptive', price, idCategory, 
        c.descriptive 'cDescriptive'  FROM tb_products p INNER JOIN tb_categories c using(idCategory)
        WHERE idProduct = :id", [":id" => $prod->getIdProduct()]);
        $sql->close();
        return $result[0];
    }

    public function updateProduct($prod){
        $sql = new Sql();
        $sql->query("UPDATE tb_products SET descriptive = :desc, price = :price, idCategory = :idCat 
        WHERE idProduct = :id", [":desc" => $prod->getDescriptive(), ":price" => $prod->getPrice(),
        "idCat" => $prod->getCategory(), ":id" => $prod->getIdProduct()]);
        $sql->close();
        return true;
    }

    public function deleteProduct($prod){
        $sql = new Sql();
        $sql->query("DELETE FROM tb_products WHERE idProduct = :id", [":id" => $prod->getIdProduct()]);
        $sql->close();
        return true;
    }

    public static function countProducts(){

        $sql = new Sql();

        try {

            $result = $sql->select("
                SELECT COUNT(idProduct) 'total' FROM tb_products 
            ");

            if(count($result) > 0){
                return $result[0];
            } else {
                return false;
            }

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

}


?>