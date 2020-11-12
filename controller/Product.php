<?php 
require_once ("DBController.php");
class Product
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addProduct($categoryid,$pname,$dateplanted,$price,$quantity,$description) {
        $query = "INSERT INTO products (categoryid,pname,dateplanted,price,quantity,description) VALUES (?,?,?,?,?,?)";
        $paramType = "issiis";
        $paramValue = array(
            $categoryid,
            $pname,
            $dateplanted,
            $price,
            $quantity,
            $description
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editProduct($productid,$categoryid,$pname,$dateplanted,$price,$quantity,$description) {
        $query = "UPDATE products SET categoryid = ?,pname = ?,dateplanted = ?,price = ?,quantity = ?,description = ? WHERE productid = ?";
        $paramType = "issiisi";
        $paramValue = array(
            $categoryid,
            $pname,
            $dateplanted,
            $price,
            $quantity,
            $description,
            $productid
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteProduct($product_id) {
        $query = "DELETE FROM products WHERE productid = ?";
        $paramType = "i";
        $paramValue = array(
            $product_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getProductById($product_id) {
        $query = "SELECT * FROM products WHERE productid = ?";
        $paramType = "i";
        $paramValue = array(
            $product_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllProduct() {
        $sql = "SELECT * FROM products ORDER BY productid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>