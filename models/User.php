<?php
class User{
    //thuộc tính
    private $id;
    private $username;
    private $password;  
    private $role;
    //phương thức
    public function __construct($id, $username, $password, $role){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }

    public function setID($id){
        $this->id = $id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    
}
?>