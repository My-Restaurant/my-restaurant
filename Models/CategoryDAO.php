<?php

require_once "Sql.php";
require_once "Category.php";

class categoryDAO{

    public function allCategories(){

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_categories");
        $sql->close();
        return $result;

    }

    public function insertCategory($category){

        $sql = new Sql();
        $sql->query("INSERT INTO tb_categories (descriptive) VALUES(:desc)", 
        [":desc" => $category->getDescriptive()]);
        $sql->close();
        return true;

    }

    public function oneCategory($category){

        $sql = new Sql();
        $result = $sql->select("SELECT descriptive FROM tb_categories WHERE idCategory = :id", 
        [":id" => $category->getIdCategory()]);
        $sql->close();
        return $result;

    }

    public function updateCategory($category){
        $sql = new Sql();
        $sql->query("UPDATE tb_categories SET descriptive = :desc WHERE idCategory = :id",
        [":desc" => $category->getDescriptive(),
         ":id" => $category->getIdCategory()
        ]);
        $sql->close();
        return true;
    }

    public function deleteCategory($category){

        $sql = new Sql();
        $sql->query("DELETE FROM tb_categories WHERE idCategory = :id",
        [":id" => $category->getIdCategory()]);
        $sql->close();
        return true;
    }
}














?>