<?php

namespace Tasty\Integration;
use Tasty\DTO\LoginData;
use Tasty\DTO\User;

/**
 * This UserDAO handels all user data in the database
 */

class UserDAO {           
    private $servername = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $databaseName = "tastyRecipes";
    private $connection;
    
    public function __construct() {
        $this->connection = mysqli_connect($this->servername, $this->dbUsername, $this->dbPassword, $this->databaseName);
        
        if(!$this->connection) {
            die("Connection to database failed: " . mysqli_connect_error);
        } else {
            mysqli_set_charset($connection, 'utf8');
        }
    }
    
    public function checkLoginData(LoginData $userLoginData) {
        $untrim = trim($userLoginData->getUsername());
        $sql = "SELECT * FROM Users WHERE username = '$untrim' LIMIT 1";      
        $result = $this->connection->query($sql);

        if($result) {
            $row = mysqli_fetch_row($result);
            $verify = password_verify(trim($userLoginData->getPassword()), $row["password"]);
            $_SESSION["user"] = $userLoginData->getUsername();
            return true; 
        } else {
            return false;
        }       
    }    

    public function registerUser(User $userRegData) {
        $untrim = trim($userRegData->getUsername());
        $hashPW = password_hash(trim($userRegData->getPassword()), PASSWORD_DEFAULT);
        $sql = "INSERT INTO Users(username, password) VALUES ('$untrim', '$hashPW')";
        
        if(!(mysqli_query($this->connection, $sql))) {
            return false;
        }
        return true;        
    }
}