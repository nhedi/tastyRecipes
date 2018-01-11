<?php

namespace Tasty\DTO;

/**
 * This LoginData holds information regarding the data given during a login trial
 */

class LoginData {
    
    private $username;
    private $password;
    
    /**
     * Assigns user login data
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
}