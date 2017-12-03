<?php

namespace Tasty\DTO;

/**
 * This User holds information regarding a Tasty Recipe user
 */

class User {
    
    private $username;
    private $password;
    
    /**
     * Creates a new user
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