<?php 
require_once ("DBController.php");
class Category
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addCategory($catname) {
        $query = "INSERT INTO category (catname) VALUES (?)";
        $paramType = "s";
        $paramValue = array(
            $catname
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editCategory($categoryid,$catname) {
        $query = "UPDATE category SET catname = ? WHERE categoryid = ?";
        $paramType = "si";
        $paramValue = array(
            $catname,
            $categoryid
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteCategory($categoryid) {
        $query = "DELETE FROM category WHERE categoryid = ?";
        $paramType = "i";
        $paramValue = array(
            $categoryid
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getCategoryById($categoryid) {
        $query = "SELECT * FROM category WHERE categoryid = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllCategory() {
        $sql = "SELECT * FROM category ORDER BY categoryid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>