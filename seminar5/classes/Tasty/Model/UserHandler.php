<?php

namespace Tasty\Model;
use Tasty\DTO\LoginData;
use Tasty\DTO\User;

use Tasty\Integration\UserDAO;

/**
 * This UserHandler handels all requests regarding users
 */

class UserHandler {
    
    /**
     * This method checks if a user can be logged in with the specified $userLoginData
     * @param $userLoginData
     * @return $loginStatus true or false
     */ 
    public function authorizeUser(LoginData $userLoginData) {
        $userDAO = new UserDAO();
        $loginStatus = $userDAO->checkLoginData($userLoginData);
        return $loginStatus;
    }
    
    /**
     * This method checks if a user can be registered with the specified $userRegData
     * @param $userRegData
     * @return $registerStatus true or false
     */
    public function registerUser(User $userRegData) {
        $userDAO = new UserDAO();
        $registerStatus = $userDAO->registerUser($userRegData);
        return $registerStatus;
    }   
}   