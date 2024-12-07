<?php
require_once 'services/AuthServices.php'
class AuthController{
    private $authService;
    public function __construct(){
        $this->authService = new AuthServices();
    public function login(){

    }
    public function logout(){}
    public function register(){}
    
}
?>