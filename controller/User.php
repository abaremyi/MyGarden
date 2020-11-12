<?php 
require_once ("DBController.php");
class User
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addUser($name,$username,$password,$phone,$type) {
        $query = "INSERT INTO users (name,username,password,phone,type) VALUES (?,?,?,?,?)";
        $paramType = "sssss";
        $paramValue = array(
            $name,
            $username,
            $password,
            $phone,
            $type
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editUser($userid,$name,$username,$password,$phone) {
        $query = "UPDATE users SET name = ?,username = ?,password = ?,phone = ? WHERE userid = ?";
        $paramType = "ssssi";
        $paramValue = array(
            $name,
            $username,
            $password,
            $phone,
            $userid
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteUser($user_id) {
        $query = "DELETE FROM users WHERE userid = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getUserById($user_id) {
        $query = "SELECT * FROM users WHERE userid = ?";
        $paramType = "i";
        $paramValue = array(
            $user_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllUser() {
        $sql = "SELECT * FROM users ORDER BY userid";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>