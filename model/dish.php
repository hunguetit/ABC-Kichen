<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'define.php';
include_once APP_PATH . DS . 'classes' . DS . 'databases.php';

class Model_Dish{

        public function getDishListById($id){
        try {
            $conn = Databases::getConnection();            
            
            $statement = $conn->prepare("SELECT * FROM product WHERE id = :id");
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            
            $products = array();
            while ($product = $statement->fetch(PDO::FETCH_OBJ)){
                $products[] = $product;
            }
            return $products;
            
        } catch (PDOException $exception) {
            return; 
        }
    }

        public function update($id, $name, $color, $weight, $picture){
            try{
                $conn = Databases::getConnection();
                
                $sql = "UPDATE product SET name=:name, color=:color, weight=:weight, 1, picture=:picture WHERE id=:id";

                $stm = $conn->prepare($sql);
                $stm->bindParam(":id", $id);
                $stm->bindParam(":name", $name);
                $stm->bindParam(":color", $color);
                $stm->bindParam(":weight", $weight);
                $stm->bindParam(":picture", $picture);
                
                $ret = $stm->execute();
                
            } catch (Exception $ex) {
                return;
            }
        }

    }
