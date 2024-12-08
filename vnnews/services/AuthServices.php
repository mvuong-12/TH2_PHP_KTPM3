<?php
    //require_once 'models/User.php';
    class AuthService{
        
        public function validateLogin($username, $password){
            try
            {
                $conn = new PDO("mysql:host=localhost;dbname=tintuc", 'root','12345' );
                
                $query = "SELECT PASSWORD, role FROM users WHERE username = :username";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":username", $username) ;
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //die("role = " .$result[0]["PASSWORD"].$result[0]["role"]);
                if(password_verify($password, $result[0]["PASSWORD"])){
                    return $result[0]["role"];
                }
                else{
                    return false;
                }
            }
            catch(PDOException $e)
                {
                    return false;
                }
            finally{
                $conn = null;
            }
        }
        public function validateRegister($username, $password){
            try 
                {   
                    $con = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '12345');
                    $query = 'INSERT INTO users(username, PASSWORD, role) VALUES(:username, :password, 0)';
                    $stmt = $con->prepare($query);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $password);
                    $stmt->execute();

                    return true;
                }
            catch(PDOException $e)
                {
                    return false;
                }
            finally{
                $conn = null;
            }
        }
        public function validateUsername($username){
            try{
                $con = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '12345');
                $query = 'SELECT COUNT(*) FROM users WHERE username = :username';
                $stmt = $con->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetchColumn();
                return $result > 0;
            }
            catch(PDOException $e)
            {
                return false;
            }
            finally{
                $conn = null;
            }
        }
}
?>