<?php 
require_once ("DBController.php");
class Order
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addOrder($productid,$customer,$phone,$resdate,$quantity,$totalprice,$status) {
        $query = "INSERT INTO orders (productid,customer,phone,reservationdate,quantity,totalprice,status) VALUES (?,?,?,?,?,?,?)";
        $paramType = "isssiis";
        $paramValue = array(
            $productid,
            $customer,
            $phone,
            $resdate,
            $quantity,
            $totalprice,
            $status
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editOrder($orderid,$productid,$customer,$phone,$resdate,$quantity,$totalprice,$status) {
        $query = "UPDATE orders SET productid = ?,customer = ?,phone = ?,reservationdate = ?,quantity = ?,totalprice = ?,status = ? WHERE orderid = ?";
        $paramType = "issiisi";
        $paramValue = array(
            $productid,
            $customer,
            $phone,
            $resdate,
            $quantity,
            $totalprice,
            $status,
            $orderid
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteOrder($orderid) {
        $query = "DELETE FROM orders WHERE orderid = ?";
        $paramType = "i";
        $paramValue = array(
            $orderid
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getOrderById($orderid) {
        $query = "SELECT * FROM orders WHERE orderid = ?";
        $paramType = "i";
        $paramValue = array(
            $orderid
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllOrder() {
        $sql = "SELECT * FROM orders ORDER BY orderid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>